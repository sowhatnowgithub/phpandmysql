import puppeteer from 'puppeteer';
import fs from 'fs';
function timeDelay(time){
	return new Promise(resolve => setTimeout(resolve,time*100));
}
var link = 'https://www.myntra.com/';
( async () =>{
const browser = await puppeteer.launch({
		args: ['--disable-http2'],
		headless: false
	});
	const page = await browser.newPage();
	await page.goto(link, {waitUntil: 'networkidle2'});
	await page.setViewport({width: 1080, height: 1024});
	const selectInput = page.locator('.desktop-query > input');
	await timeDelay(30);
	await selectInput.click();
	await timeDelay(10);
	await selectInput.fill('jeans');
	await timeDelay(20);
	await Promise.all([
		page.keyboard.press('Enter'),
		page.waitForNavigation({waitUntil: 'domcontentloaded'})
	]);
	const newh  = await page.content();
	await timeDelay(30);
	const datas = await page.evaluate(()=>{
		const dataList = document.querySelectorAll(".product-base");
		return Array.from(dataList).map((data)=>{
			return {
				id: data.getAttribute('id') || 'No Id',
				name: data.querySelector('.product-product')?.innerText || 'No Name',
				imageUrl: data.querySelector('img')?.src || 'No Image'
			}
		});
	});
	fs.writeFile('data.json', JSON.stringify(datas,null, 2), (err)=>{
		if(err) console.error('error');
		else console.log('saved');
	});
	await browser.close();

})();
	

/*<div class="desktop-query" data-reactid="1038"><input placeholder="Search for products, brands and more" class="desktop-searchBar" value="" data-reactid="1039"><a class="desktop-submit" data-reactid="1040"><span class="myntraweb-sprite desktop-iconSearch sprites-search" data-reactid="1041"></span></a></div>
 *
 *
 * <input placeholder="Search for products, brands and more" class="desktop-searchBar" value="" data-reactid="1039">
 *
 * <a class="desktop-submit" data-reactid="1040"><span class="myntraweb-sprite desktop-iconSearch sprites-search" data-reactid="1041"></span></a>
 *
 * */
