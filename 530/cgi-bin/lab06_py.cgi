#!/usr/bin/python
import cgi, cgitb
form = cgi.FieldStorage()

name = form.getvalue('name')
address = form.getvalue('adrs')
phone = form.getvalue('phone')

print 'Content-type:text/html\n\n'
print '<html><head><title>Lab 06 | Python</title><link rel="stylesheet" href="./lab03.css"><link rel="stylesheet" href="./lab04.css"></head><body class = "bodystyle2">'
print '<h1>Your Information</h1>'
print '<br>Full Name: ' + name
print '<br>Address: ' + address
print '<br>Phone Number:<br>'
print '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>'
print '<script type="text/javascript">'
print 'var phoneNum="' + phone + '";'
print """var splitPhone=phoneNum.split("-");
document.write("<span class='one' style='color: orange; font-size: 3em'>" + splitPhone[0] + "</span>");
$('.one').animate({fontSize: '3.5em'}, "slow");
document.write("<span class='two' style='color:red; font-size: 3em; opacity: 0.5;'>- " + splitPhone[1] + "</span>");
$('.two').delay(1000).animate({margin: '25px', opacity: '1.0'}, "slow");
document.write("<span class='three' style='color:yellow; font-size: 3em;'>- " + splitPhone[2] + "</span>");
$('.three').delay(2000).animate({letterSpacing: '10px'}, "slow");
</script>
</body></html>
"""
