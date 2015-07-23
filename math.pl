#!/usr/bin/env perl 
#===============================================================================
#
#         FILE: math.pl
#
#        USAGE: ./math.pl  
#
#  DESCRIPTION: 
#
#      OPTIONS: ---
# REQUIREMENTS: ---
#         BUGS: ---
#        NOTES: ---
#       AUTHOR: YOUR NAME (), 
# ORGANIZATION: 
#      VERSION: 1.0
#      CREATED: 07/23/2015 11:24:38 AM
#     REVISION: ---
#===============================================================================

use strict;
use warnings;
use utf8;

sub getResult
{
    my ($x) =@_;
    my $result = <>;

    if (int($result) == $x)
    {
        print "good\n";
        return 1;
    }
    else
    {
        print "bad, result = $x \n";
        return undef;
    }

}

sub _add
{
    $a = int(rand(100));
    $b = int(rand(100));
    
    print "$a+$b=";

    return $a+$b;
}

sub _sub
{
    $a = int(rand(100));
    $b = int(rand(100));
    
    print "$a-$b=";

    return $a-$b;
}

sub main
{
    getResult(_add());
    getResult(_sub());
}

main();
