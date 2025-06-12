import puppeteer from 'puppeteer'

const test = async (browser) => {
const page = await browser.newPage();
await page.goto('http://localhost:8000');

await page.setViewport({width: 1080, height: 1024});
await page.locator('a').filter( a => a.innerText === 'Start Messaging' ).click();

await page.locator('input').fill('Hi this is puppet');
await page.locator('button').click();


}
const shitTest = async (browser,times)=>{
for(var i =0; i < times ;i ++)
	await test(browser);
}
const mainShit = async ()=>{
	const browser = await puppeteer.launch();
	await shitTest(browser,10);
	await browser.close();
};

mainShit();
