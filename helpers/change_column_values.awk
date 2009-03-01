#!/usr/bin/env awk -f

{
  num_fields = parse_csv($0, csv, ",", "'", "'", "\\n", 1);
  if (num_fields < 0) {
    printf "ERROR: %s (%d) -> %s\n", csverr, num_fields, $0;
  } else {
  
    # Go through each column
    for (i = 0;i < num_fields;i++) {
      pattern_found = 0;
      
      if (i in columns_to_change) {
      
        # If the column's value is one of the old increments, replace it with new value
        if (csv[i] in increment_pairs) {
          pattern_found = 1;
          printf "%s,", increment_pairs[csv[i]];
        } else {
        
          # Check if the column's value is the same as a system path
          count = 0;
          while (pattern_pair_old[count] != "") {
            if (csv[i] == pattern_pair_old[count]) {
              pattern_found = 1;
              printf "%s,", pattern_pair_new[count];
            }
            count += 1;
          }
          
          # If there are still no matches, check through fuzzy matches
          if (pattern_found == 0) {
            count = 0;
            column_value = csv[i];
            while (fuzzy_pattern_pair_old[count] != "") {
              search = match(csv[i], fuzzy_pattern_pair_old[count]);
              if (search != 0) {
                pattern_found = 1;
                gsub(fuzzy_pattern_pair_old[count], fuzzy_pattern_pair_new[count], column_value);
              }
              count += 1;
            }
            if (pattern_found != 0) {
              printf "%s,", column_value;
            }
          }
          
        }
        
      }
      
      # If there were no matches, just keep the existing data
      if (pattern_found == 0) {
        printf "%s,", csv[i];
      }
      
    }
    printf "\n";
  }
}