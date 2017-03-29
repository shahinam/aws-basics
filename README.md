# AWS Basics

## EC2
Spinup an Ubuntu instance.

### Instance metadata
Instance metadata is data about your instance that you can use to configure or manage the running instance. 
see https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html
To get instance data, run:
```
curl http://169.254.169.254/latest/meta-data/
curl http://169.254.169.254/latest/meta-data/ami-id
```
and so on..

To view all instance data at once, use the provided script:
* Run ``setup.sh`` to install basic software needed.
* After setup copy ``instance-metadata.php`` to ``/var/www/html``
* Open the file in browser, ``http://your-instance-ip/instance-metadata.php`` to see all the metadata available as a tree.