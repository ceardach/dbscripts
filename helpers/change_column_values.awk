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
      # Check for normal instances of possible foreign keys
      
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
        
      } else {
        # Check for cases where a possible foreign key value has a dependency
        if (column_with_dependency == i) {
        
          # Check to see if the value is one of the old increments
          if (csv[i] in increment_pairs) {
          
            # Check to see if the dependencies match up
            dependency_pattern_found = 1;
            dependency_match = 0;
            for (n = 0; n < num_fields; n++) {
              if (n in column_dependency) {
                # Check for both string and integer possibilities of the value
                if (csv[n] != column_dependency[n] && csv[n] != ("'" column_dependency[n] "'")) {
                  # Unset found if there is even one case of failure
                  dependency_pattern_found = 0;
                } else {
                  # Because we're setting found to default to true, 
                  # we need to ensure we really did find any values at all
                  dependency_match = 1;
                }
              } 
            }
            
            # Now check to see if we really found anything
            if (dependency_pattern_found == 1 && dependency_match == 1) {
              pattern_found = 1;
              
              # Replace the value
              printf "%s,", increment_pairs[csv[i]];
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