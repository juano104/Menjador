<?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="https://intranet.menjadorescola.me/">Go back</a>';