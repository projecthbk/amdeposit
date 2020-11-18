# amdeposit
## Anonymous Money Deposit ([Example Site](https://zygtech.pl/amdeposit/))

### Package with obfuscated sources: [AMDeposit.zip](https://github.com/projecthbk/amdeposit/files/5558047/AMDeposit.zip)

PHP written scripts to encode in QR Codes secure money deposits as in "Swiss Bank". No database. Uses:

1. [PHP QR Code](http://phpqrcode.sourceforge.net/)
2. [QR Scanner](https://nimiq.github.io/qr-scanner/)

Installation:
1. `Clone` or `unpack ZIP` on server to `public web` folder
2. Edit `config.php` with `non-public path` (create a folder with `safe name`) and `security protection string`
3. Add to `CRON` monthly cleaning of `temporary file` blocking `multiple withdrawal` in same month:
    + `crontab -e`, in example `0 0 1 * * sudo -u www-data rm /home/pi/74d4ddea0d225d5a/AMDeposit.db`
4. Check `index.html` for example of usage AND/OR use `PHP scripts` as an `API` to your system
