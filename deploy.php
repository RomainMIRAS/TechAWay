<?php shell_exec( 'cd <repo-directory>; git reset --hard origin/<dev/prod>; git clean -d -f; git pull https://gitlab-ci-token:<Access-Token>@gitlab.com/<your-repo-url>.git <dev/prod>' ); ?>
