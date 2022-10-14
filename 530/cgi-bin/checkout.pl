use CGI ':standard;';
use strict;
print "Content-type: text/html\n\n";

my $name = param("firstname")
my $email = param("email")

print "<html>";
print "<head>";

print '<link rel = "stylesheet" type = "text/css" href = "./styles/style.css">';
print '<link rel = "stylesheet" type = "text/css" href = "./styles/checkout.css">';
print "</head>";

print '<body>';

print "<p>Thank you $name for your order!</p>";
print "<p>We will email you your receipt and confirmation to your email at $email.</p>";

print "</body>";
print "</html>";