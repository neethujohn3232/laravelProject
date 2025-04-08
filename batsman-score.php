<?php
$score = [1, 2, 4, 6, 2, 2, 2, 4, 6, 6, 2, 1, 2, 3, 2, 6, 4, 6, 1, 2, 1, 1, 6, 4, 1, 2, 6, 4, 6, 1];

$batsmanA = 0;
$batsmanB = 0;
$striker = 'A'; // A for Batsman A, B for Batsman B

foreach ($score as $i => $runs) {
    // Add runs to current striker
    if ($striker == 'A') {
        $batsmanA += $runs;
    } else {
        $batsmanB += $runs;
    }
    
    // Change strike for odd runs
    if ($runs % 2 != 0) {
        $striker = ($striker == 'A') ? 'B' : 'A';
    }
    
    // Change strike at end of over
    if (($i + 1) % 6 == 0) {
        $striker = ($striker == 'A') ? 'B' : 'A';
    }
}

echo "Batsman A: $batsmanA\n";
echo "Batsman B: $batsmanB\n";
echo "Total: " . ($batsmanA + $batsmanB);
?>