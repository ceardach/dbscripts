#!/usr/bin/env awk -f

{
    num_fields = parse_csv($0, csv, ",", "\"", "\"", "\\n", 1);
    if (num_fields < 0) {
        printf "ERROR: %s (%d) -> %s\n", csverr, num_fields, $0;
    } else {
        for (i = 0;i < num_fields;i++) {
            printf "%s#CM#", csv[i];
        }
        printf "\n";
    }
}
