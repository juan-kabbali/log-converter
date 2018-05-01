# LOG CONVERTER

### Clone the repository in ezproxy root directory */usr/local/ezproxy*
```sh
$ git clone https://github.com/juan-kabbali/LogConverter.git
```

### Modify linux permissions, grant execution for owner user
```sh
$ chmod 744 LogConverter/Logconverter.php
```

### Execute the LogConverter.php file

The command has 3 inputs
   
> **--help**
>
> *deploy the command usage* 

> **--directory**
>
>*to specify the directory where the logs are placed. By default, the command will search in /usr/local/ezproxy/docs/loggedin/  You can specify relative or absolute directories*

> **--format**
>
>*to specify the logs format. By default, the command will use \*.log*

### Examples
  
###### The command will use default values, i.e. it will search the logs in **/usr/local/ezproxy/docs/loggedin/** with **\*.log** format 
```sh
$ Logconverter.php
```
  
###### The command will search in the specified directory */usr/local/ezproxy/* all **\*.log** files 
```sh
$ Logconverter.php --directory /usr/local/ezproxy/
```

###### The command will search in the default directory */usr/local/ezproxy/docs/loggedin/* all **\*.mylogformat** files 
```sh
$ Logconverter.php --format *.mylogformat
```

###### The command will search in the specified directory */usr/local/ezproxy/logs* all **\*.mylogformat** files 
```sh
$ Logconverter.php --directory /usr/local/ezproxy/logs/ --format *.mylogformat
```

###### When the command finds matching directory and format file logs, it starts to convert all the matching files printing them line per line as **stdout** with its original format 
###### When te convertion proccess has ended, you will find new logs files called **\*.mylogformat.intelproxy**

*Before execute LogConverter.php*
```sh
$ pwd
/usr/local/ezproxy/
$ ls -la
ezp20161005.mylogformat
ezp20161006.mylogformat
ezp20161007.mylogformat
```

*Command execution*
```sh
$ LogConverter/Logconverter.php --directory /usr/local/ezproxy/ --format *.mylogformat
```

*After execute LogConverter.php you will see the original logs and the new ones as **\*.intelproxy***
```sh
$ ls -la
ezp20161005.mylogformat
ezp20161005.mylogformat.intelproxy
ezp20161006.mylogformat
ezp20161006.mylogformat.intelproxy
ezp20161007.mylogformat
ezp20161007.mylogformat.intelproxy
```
 
This repository has a shell script called **rename.sh**, if you want, you can execute it to organize and separate between the new logs with old ones

*YOU HAVE TO EXECUTE **RENAME.SH** IN THE DIRECTORY WHERE LOGS ARE PLACED, SO USE **mv** OR **cp** COMMANDS AS NEEDED*
```sh
$ cp /usr/local/ezproxy/Logconverter/rename.sh /usr/local/ezproxy/rename.sh
```

###### Finally, execute ./rename.sh
```sh
$ pwd 
/usr/local/ezproxy/
$ ./rename.sh
```

This command will create a new directory called **elogimlogs** with elogim logs with **\*.log-elogim** files format and rename all **\*.intelproxy** files to **\*.log** files  
```sh
$ tree
.
├── elogimlogs
│   ├── ezp20161115.log-elogim
│   ├── ezp20161116.log-elogim
│   └── ezp20161117.log-elogim
├── ezp20161115.log
├── ezp20161116.log
├── ezp20161117.log
└── rename.sh

```

