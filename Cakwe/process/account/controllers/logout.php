<?php
session_start();
session_destroy();
header("Location: /Cakwe/home?message=logout_success");
