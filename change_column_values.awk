#!/usr/bin/awk -f

{
  num_fields = parse_csv($0, csv, ",", "'", "'", "\\n", 1);
  if (num_fields < 0) {
    printf "ERROR: %s (%d) -> %s\n", csverr, num_fields, $0;
  } else {
    for (i = 0;i < num_fields;i++) {
      if ((i in columns_to_change) && (csv[i] in increment_pairs)) {
        printf "%s,", increment_pairs[csv[i]];
      } else {
        printf "%s,", csv[i];
      }
    }
    printf "\n";
  }
}