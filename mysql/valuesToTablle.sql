INSERT INTO
    orders (order_id, customer_id, amount, date)
VALUES
    (NULL, 3, 69.98, '2007-04-02'),
    (NULL, 1, 49.99, '2007-04-15'),
    (NULL, 2, 74.98, '2007-04-19'),
    (NULL, 3, 24.99, '2007-05-01');

-- Insert data into the books table
INSERT INTO
    books (isbn, author, title, price)
VALUES
    (
        '0-672-31697-8',
        'Michael Morgan',
        'Java 2 for Professional Developers',
        34.99
    ),
    (
        '0-672-31745-1',
        'Thomas Down',
        'Installing Debian GNU/Linux',
        24.99
    ),
    (
        '0-672-31509-2',
        'Pruitt, et al.',
        'Teach Yourself GIMP in 24 Hours',
        24.99
    ),
    (
        '0-672-31769-9',
        'Thomas Schenk',
        'Caldera OpenLinux System Administration Unleashed',
        49.99
    );

-- Insert data into the order_items table
INSERT INTO
    order_items (order_id, isbn, quantity)
VALUES
    (1, '0-672-31697-8', 2),
    (2, '0-672-31769-9', 1),
    (3, '0-672-31769-9', 1),
    (3, '0-672-31509-2', 1),
    (4, '0-672-31745-1', 3);

-- Insert data into the book_reviews table
INSERT INTO
    book_reviews (isbn, review)
VALUES
    (
        '0-672-31697-8',
        'The Morgan book is clearly written and goes well beyond most of the basic Java books out there.'
    );
