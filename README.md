# Launch Button

Deploying your website should be so easy your cat could do it!

Out of the box the launch button integrates with a
[Phing](http://www.phing.info/trac/) build.xml script, but you can customize 
the launch file to run with your deployment script.

## Installation

Download the files and load it into your development/staging site with the
folder name of your choice (_I usually use /launch_). After you do that you can
visit http://yourstagingurl/launch and see the big green launch button.

## Phing

If you are using this as it you will need a phing build.xml file a directory above
your launch folder. If you don't want to change the launch.php file you will need
a `deploy` target that updates your website. I recommend using rsync inside an
<exec> task if you don't have a deployment script already.

The output message on the launch button will be whatever you display in <echo>
tasks in your deploy script.

I would also suggest putting /launch/* into your exclude section so your launch
button doesn't get pushed to your live site!

## License

This launch button is licensed under [Creative Commons 0](http://creativecommons.org/publicdomain/zero/1.0/). 

## Background Pattern

The background pattern was taken from [Subtle Patterns](http://subtlepatterns.com/?p=1222).

----

Developed by [Dave Widmer](dwidmer@bgsu.edu)
