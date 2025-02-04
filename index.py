"""

import requests
from bs4 import BeautifulSoup

url = "https://es.wikipedia.org/wiki/Wikipedia:Portada"
response = requests.get(url)

soup = BeautifulSoup(response.text, "html.parser")
titulo = soup.title.text

print(f"el titulo es {titulo}")

"""

import requests
from bs4 import BeautifulSoup

url = "https://es.wikipedia.org/wiki/Wikipedia:Portada"
response = requests.get(url)

soup = BeautifulSoup(response.text, "html.parser")

actualidad_section = soup.find(id="main-cur")
titulos_actualidad = actualidad_section.find_all("li")

for titulo in titulos_actualidad:
    print(titulo.text)
