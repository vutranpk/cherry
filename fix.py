import json
with open('new_testi.json', 'r', encoding='utf-8') as f:
    data = json.load(f)
    new_html = data['html']

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

start = content.find('<!-- TESTIMONIAL SECTION -->')
end = content.find('</section>', start) + 10

if start != -1 and end != -1:
    content = content[:start] + '<!-- TESTIMONIAL SECTION -->\n    ' + new_html + content[end:]
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(content)
    print('Replaced successfully')
else:
    print('Could not find section')
