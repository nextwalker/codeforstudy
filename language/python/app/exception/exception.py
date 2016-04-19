import random

num = random.randint(0,100)

while True:
    try:
        guess = int(raw_input("Enter 1-100:"))
    except ValueError, e:
        print "Enter 1-100"
        continue
    if guess > num:
        print "guess Bigger", guess
    elif guess < num:
        print "guess Smaller", guess
    else:
        print "Guess OK. Game Over!"
        break;
    print "\n"
