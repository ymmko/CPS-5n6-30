#!/usr/bin/perl
use CGI ':standard';
use strict;
print "Content-type: text/html\n\n";

my $username = param('username');
my $animal = param('animal');
my $colour = param('colour');
my $petname = param('petname');

print "<html>";
print "<head>";

print '<link rel = "stylesheet" type = "text/css" href = "./lab03.css">';
print "</head>";

print '<body class = "bodystyle2">';

print "<p> Your name is: $username</p>";
print "<p>You chose a $colour $animal named $petname as your pet!</p>";

print "</body>";
print "</html>";
