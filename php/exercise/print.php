<?php
for ( $i = 1; $i <= 100; $i++ ) {
	echo $i;
}
echo "\n";
for ( $i = 1; $i <= 100; $i++ ) {
	echo $i,' ';
	if( $i%10 == 0 ) {
		echo "\n";
	}
}
echo "\n";
for ( $i = 1; $i <= 100; $i++ ) {
	printf("%'*4s",$i);
	if( $i%10 == 0 ) {
		echo "\n";
	}
}
echo "\n";
for ( $i = 1; $i <= 100; $i++ ) {
	printf("%-4s",(string)$i);
	if( $i%10 == 0 ) {
		echo "\n";
	}
}
?>