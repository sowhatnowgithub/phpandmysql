<?php

function todo($message)
{
    throw new ErrorException("TODO : " . $message);
}

// in lexer we treat them as a string of charcters #include <stdio.h>\nint main(...

class Loc
{
    public $file_path;
    public $row;
    public $col;
    public function __construct($file_path, $row, $col)
    {
        $this->file_path = $file_path;
        $this->row = $row;
        $this->col = $col;
    }

    public function display()
    {
        return sprintf(
            "%s:%d:%d",
            $this->file_path,
            $this->row + 1,
            $this->col + 1
        );
    }
}
$iota = 0;
define("TOKEN_NAME", $iota++);
define("TOKEN_OPAREN", $iota++);
define("TOKEN_CPAREN", $iota++);
define("TOKEN_OCURLY", $iota++);
define("TOKEN_CCURLY", $iota++);
define("TOKEN_SEMICOLON", $iota++);
define("TOKEN_NUMBER", $iota++);
define("TOKEN_STRING", $iota++);
define("TOKEN_RETURN", $iota++);

class Token
{
    public $type;
    public $text;
    public $loc;
    public function __construct($loc, $type, $text)
    {
        $this->loc = $loc;
        $this->type = $type;
        $this->text = $text;
    }
}
class Lexer
{
    public $source;
    public $cur; // this points to the current thing we are parsing
    public $bol; // when the cursor reaches a new line (i) bol gets updated to find the column
    public $row;
    public $file_path;
    public function __construct($file_path, $source)
    {
        $this->source = $source;
        $this->file_path = $file_path;
        $this->cur = 0;
        $this->bol = 0;
        $this->row = 0;
    }
    function is_not_empty()
    {
        return $this->cur < strlen($this->source);
    }
    function chop_char()
    {
        if ($this->is_not_empty()) {
            $x = $this->source[$this->cur]; // this is a single scope variable x, in php there is only a single scope
            // it also checks for out of bounds errors
            $this->cur += 1;
            if ($x === "\n") {
                $this->bol = $this->cur;
                $this->row += 1;
            }
        }
    }
    function loc()
    {
        return new Loc($this->file_path, $this->row, $this->cur - $this->bol);
    }
    function trim_left()
    {
        while (
            $this->is_not_empty() &&
            ctype_space($this->source[$this->cur])
        ) {
            $this->chop_char();
        }
    }
    function drop_line()
    {
        while ($this->is_not_empty() && $this->source[$this->cur] != "\n") {
            $this->chop_char();
        }
        if ($this->is_not_empty()) {
            $this->chop_char();
        }
    }
    function next_token()
    {
        $this->trim_left();
        while ($this->is_not_empty() && $this->source[$this->cur] === "#") {
            $this->drop_line();
            $this->trim_left();
        }
        if (!$this->is_not_empty()) {
            return false;
        }

        $loc = $this->loc();

        if (ctype_alpha($this->source[$this->cur])) {
            $index = $this->cur;
            while (
                $this->is_not_empty() &&
                ctype_alnum($this->source[$this->cur])
            ) {
                $this->chop_char();
            }
            $text = substr($this->source, $index, $this->cur - $index);
            return new Token($loc, TOKEN_NAME, $text);
        }
        $literal_tokens = [
            "(" => TOKEN_OPAREN,
            ")" => TOKEN_CPAREN,
            "{" => TOKEN_OCURLY,
            "}" => TOKEN_CCURLY,
            ";" => TOKEN_SEMICOLON,
        ];
        $first = $this->source[$this->cur];
        if (isset($literal_tokens[$first])) {
            $this->chop_char();
            return new Token($loc, $literal_tokens[$first], $first);
        }
        if ($first === '"') {
            $this->chop_char();
            $start = $this->cur;
            while ($this->is_not_empty() && $this->source[$this->cur] !== '"') {
                $this->chop_char();
            }
            if ($this->is_not_empty()) {
                $text = substr($this->source, $start, $this->cur - $start);
                $this->chop_char();
                return new Token($loc, TOKEN_STRING, $text);
            }
            echo sprintf(
                "%s: Error: unclosed string literal\n",
                $loc->display()
            );
            return false;
        }
        if (ctype_digit($first)) {
            $start = $this->cur;
            while (
                $this->is_not_empty() &&
                ctype_digit($this->source[$this->cur])
            ) {
                $this->chop_char();
            }
            $value = (int) substr($this->source, $start, $this->cur - $start);
            return new Token($loc, TOKEN_NUMBER, $value);
        }
    }
}

$file_path = "hello.c";
$source = file_get_contents($file_path);

if (!$source) {
    exit("File not found\n");
}
$lexer = new Lexer($file_path, $source);

$token = $lexer->next_token();
while ($token) {
    echo sprintf("%s: %s\n", $token->loc->display(), $token->text);

    $token = $lexer->next_token();
}
