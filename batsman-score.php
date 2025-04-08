<?php
// Score array with runs from each ball
$score = [1, 2, 4, 6, 2, 2, 2, 4, 6, 6, 2, 1, 2, 3, 2, 6, 4, 6, 1, 2, 1, 1, 6, 4, 1, 2, 6, 4, 6, 1];

// Initialize scores and strike status
$batsmanA = 0;
$batsmanB = 0;
$isAOnStrike = true; // Batsman A starts on strike

// Process each ball
for ($i = 0; $i < count($score); $i++) {
    // Add runs to correct batsman
    if ($isAOnStrike) {
        $batsmanA += $score[$i];
    } else {
        $batsmanB += $score[$i];
    }
    
    // Change strike if runs are odd
    if ($score[$i] % 2 != 0) {
        $isAOnStrike = !$isAOnStrike;
    }
    
    // Change strike at the end of an over (after every 6 balls)
    if (($i + 1) % 6 == 0) {
        $isAOnStrike = !$isAOnStrike;
    }
}

// Print results
echo "Batsman A: $batsmanA runs\n";
echo "Batsman B: $batsmanB runs\n";
echo "Total: " . ($batsmanA + $batsmanB) . " runs\n";
?>