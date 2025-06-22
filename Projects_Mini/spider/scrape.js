const puppeteer = require('puppeteer-extra');
const StealthPlugin = require('puppeteer-extra-plugin-stealth');
puppeteer.use(StealthPlugin());

(async () => {
	  const url = process.argv[2] || 'https://www.myntra.com/tshirts/...';
	  const browser = await puppeteer.launch({ headless: true });
	  const page = await browser.newPage();
	  await page.goto(url, { waitUntil: 'networkidle2' });

	  const data = await page.evaluate(() => {
		      return {
				        title: document.querySelector('.pdp-title')?.innerText || '',
				        brand: document.querySelector('.pdp-brand')?.innerText || '',
				        price: document.querySelector('.pdp-price .pdp-price-value')?.innerText || '',
				        image: document.querySelector('.image-grid-image')?.src || ''
				      };
		    });

	  console.log(JSON.stringify(data));
	  await browser.close();
})();

