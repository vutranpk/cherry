const fs = require('fs');
const data = JSON.parse(fs.readFileSync('new_testi.json', 'utf8'));
const new_html = data.html;

let content = fs.readFileSync('index.html', 'utf8');
const start = content.indexOf('<!-- TESTIMONIAL SECTION -->');
const end = content.indexOf('</section>', start) + 10;

if (start !== -1 && end !== -1) {
    content = content.substring(0, start) + '<!-- TESTIMONIAL SECTION -->\n    ' + new_html + content.substring(end);
    fs.writeFileSync('index.html', content, 'utf8');
    console.log('Replaced successfully');
} else {
    console.log('Could not find section');
}
