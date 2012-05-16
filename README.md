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

## Troubleshooting

If you are getting stuck on the loading message, you may need to do some advanced
commands to get this script to work.

To debug what is going on you should put the following after the call to exec in
`launch.php`.

``` php
var_dump($output); die;
```

Then you can open up Firebug (or whatever developer tools you are using) and view
the response for the script.

#### Host key verification failed

If you see this message you have to give the user running the server, _apache or www-data usually_,
access to your live server.

First you will want to follow the instructions on
[Stack Overflow](http://serverfault.com/questions/231630/how-do-you-create-an-ssh-key-for-the-apache-user-on-redhat)
to create ssh keys for the apache user.

Then you will need to approve the remote host authenticity by running the command below,
substituting in your information of course.

``` bash
sudo -u www-data ssh user@liveserver.info
```

Then you will need to upload your public key to the remote server.

When all of that is done, take out the debug line you added and press the Launch button!

## License

This launch button is licensed under [Creative Commons 0](http://creativecommons.org/publicdomain/zero/1.0/). 

## Background Pattern

The background pattern was taken from [Subtle Patterns](http://subtlepatterns.com/?p=1222).

----

Developed by [Dave Widmer](http://www.davewidmer.net)
