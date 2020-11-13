# amdeposit
## Anonymous Money Deposit

[Example Site](https://zygtech.pl/amdeposit/)

PHP written scripts to encode in QR Codes secure money deposits. Uses:

1. [PHP QR Code](http://phpqrcode.sourceforge.net/)
2. [QR Scanner](https://nimiq.github.io/qr-scanner/)

Installation:
1. `Clone` or `unpack ZIP` on server to `public web` folder
2. Edit `config.php` with `non-public path` and `security protection string`
3. Add to `CRON` monthly cleaning of `temporary files` blocking `multiple withdrawal` in same month
    + `0 0 1 * * rm -R /home/pi/amdeposit/*`
4. Check `index.html` for example of usage AND/OR use `PHP scripts` as an `API` to your system
