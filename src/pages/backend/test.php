<?php
$sifre_hash = password_hash("weer", PASSWORD_DEFAULT);
echo "Merhaba " . $sifre_hash . ".";