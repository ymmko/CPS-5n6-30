#!/usr/bin/ruby -w

require 'cgi'
cgi = CGI.new
puts "Content-type: text/html\n\n"

name = cgi['name']
address = cgi['adrs']

puts '<html><head><title>Lab 06 | Ruby</title><link rel="stylesheet" href="./lab03.css"></head><body class="bodystyle2">'
puts "<h1>Your Information</h1>"
puts "<br>Full Name: " + name
puts "<br>Address: " + address
puts "<br>Phone Number:<br>"

puts '<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>'
puts '<script type="text/javascript">'
puts 'var phoneNum = "' + cgi['phone'] + '";'
puts <<ANIMATE
  var splitPhone = phoneNum.split("-");
  document.write("<span class = 'one' style='color:orange; font-size: 3em;'>" + splitPhone[0] + "</span>");
  $('.one').hide().fadeIn(1000);
  document.write("<span class = 'two' style='color:red; font-size: 3em;'>-" + splitPhone[1] + "</span>");
  $('.two').hide().fadeIn(2000);
  document.write("<span class = 'three' style='color:green; font-size: 3em;'>-" + splitPhone[2] + "</span>");
  $('.three').hide().fadeIn(3000);
ANIMATE
puts '</script>'
puts "</body></html>"
