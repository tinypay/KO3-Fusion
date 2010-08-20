**Installation**:

1. Make sure you're in the root folder of the git repository of your Kohana installation
2. Add this repository as a submodule in /modules/ko3-fusion:
	<pre>git submodule add git@github.com:melvinmt/KO3-Fusion.git modules/ko3-fusion
		git submodule init
		git submodule update</pre>
3. CD into /modules/ko3-fusion
4. Run git commands to fetch the cloudfusion repository:
	<pre>git submodule init
git submodule update</pre>
5. CD into /modules/ko3-fusion/vendor/cloudfusion
6. Run git command to checkout to the 2.5.0 release:
	<pre>git checkout 2.5.0</pre>
7. Go back to /modules/ko3-fusion
8. Rename /config/cloudfusion-sample.php to /config/cloudfusion.php
9. Fill in your Amazon credentials in /config/cloudfusion.php
10. Add this line to the modules section in bootstrap.php:
<pre>'ko3-fusion' => MODPATH.'ko3-fusion', // KO3Fusion, a Cloudfusion integration</pre>

11. Phew, you made it!

**Usage**:

You can include the Cloudfusion library from anywhere in your Kohana with this simple line:
<pre>KO3Fusion::init()</pre>
You're able to use the normal Cloudfusion classes and methods after initialization:
<pre>KO3Fusion::init();
$sdb = new AmazonSDB();</pre>

OR don't initialize and use the Amazon static methods if you're lazy:
<pre>$sdb = Amazon::SDB();
$sdb->put_attributes();</pre>
OR chain the methods if you're really really lazy:
<pre>Amazon::SDB()->put_attributes();</pre>

**Cloudfusion Documentation**:
http://getcloudfusion.com/docs/2.5/
