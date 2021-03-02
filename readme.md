

## LinkedIn Profile Link
 Here's link to my profile on [LinkedIn](https://www.linkedin.com/in/mobeendev) 

Thank you

Regards:

Abdul Mobeen




<?php 
// PHP program to check if a 
// given ISBN is valid or not. 

function isValidISBN($isbn) 
{ 
	// length must be 10 
	$n = strlen($isbn); 
	if ($n != 10) 
		return -1; 

	// Computing weighted sum 
	// of first 9 digits 
	$sum = 0; 
	for ($i = 0; $i < 9; $i++) 
	{ 
		$digit = $isbn[$i] - '0'; 
		if (0 > $digit || 9 < $digit) 
			return -1; 
		$sum += ($digit * (10 - $i)); 
	} 

	// Checking last digit. 
	$last = $isbn[9]; 
	if ($last != 'X' && ($last < '0' || 
						$last > '9')) 
		return -1; 

	// If last digit is 'X', add 10 
	// to sum, else add its value. 
	$sum += (($last == 'X') 
	? 10 : ($last - '0')); 

	// Return true if weighted sum of 
	// digits is divisible by 11. 
	return ($sum % 11 == 0); 
} 

// Driver code 
$isbn = "007462542X"; 
if (isValidISBN($isbn)) 
	echo "Valid"; 
else
	echo "Invalid"; 

// This code is contributed by ajit. 
?> 
