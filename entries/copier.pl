#!/usr/bin/perl

use File::Copy;
use strict;
use warnings;

# Justin McCandless
# filename: copier.pl
# 03/07/09
#
# This program is a quick utility program that copies a certain filename
# a given number of times.


print "\nThis program will copy a file that you specify as many times as you specify, to
       new files named a given root name followed by incrementing numbers.\n\n";

print "What file would you like to copy?  ";
my $copyme = <>;
chomp($copyme);

print "\nWhat would you like the new filename root to be?  ";
my $makeme = <>;
chomp($makeme);

print "\nWhat would you like the file extension to be?  ";
my $ext = <>;
chomp($ext);

print "\nHow many new files would you like to create?  ";
my $copies = <>;
chomp($copies);

my $i = 1;
while ($i <= $copies)
{
   my $filename = "$makeme" . "$i" . "$ext";
   copy($copyme, $filename);
   $i++;
}

print "\n\nSuccessfully created $copies copies of $copyme into filenames of the type $makeme X $ext.\n\n";
