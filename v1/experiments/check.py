from gpiozero import Button
import requests

url = '/var/www/html/check.php'

print ("Hello World 1")

button = Button(4)

if button.is_pressed:
    print("Pressed")
print ("Hello World 2")

myobj = {'key', 'val'}
x = requests.post(url, json = myobj)
print(x.text)
