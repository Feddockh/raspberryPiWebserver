# The PLC will send a high signal until the pole is removed from the first pipe.
# The abscence of this signal will result in the start of the timer.

from gpiozero import Button

button = Button(4)

if button.is_pressed:
    print("inactive")
else:
    print ("active")