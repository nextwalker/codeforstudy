awk '!a[$1]++' data
sort -u data
sort data | uniq
