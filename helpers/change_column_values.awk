#!/usr/bin/env awk -f

{
  num_fields = parse_csv($0, csv, ",", "'", "'", "\\n", 1);
  if (num_fields < 0) {
    printf "ERROR: %s (%d) -> %s\n", csverr, num_fields, $0;
  } else {
    for (i = 0;i < num_fields;i++) {
      pattern_found = 0;
      if (i in columns_to_change) {
        if (csv[i] in increment_pairs) {
          pattern_found = 1;
          printf "%s,", increment_pairs[csv[i]];
        } else {
          count = 0;
          while (pattern_pair_old[count] != "") {
            if (csv[i] == pattern_pair_old[count]) {
              pattern_found = 1;
              printf "%s,", pattern_pair_new[count];
            }
            count += 1;
          }
        }
      }
      if (pattern_found == 0) {
        printf "%s,", csv[i];
      }
    }
    printf "\n";
  }
}