Documentation
-----------------

Status project: WIP - Work In Progress

Installation
-----------------

If you use a deps file, you could add:

 <pre>
 [FightmasterPublicationBundle]
     git=https://github.com/fightmaster/FightmasterPublicationBundle.git
     target=vendor/bundles/Fightmaster/PublicationBundle
 </pre>

Or if you want to clone the repos:

 <pre>
 git clone https://github.com/fightmaster/FightmasterPublicationBundle.git vendor/bundles/Fightmaster/PublicationBundle
 </pre>

Add the namespace to your autoloader

```php
<?php
 $loader->registerNamespaces(array(
     ............
     'Fightmaster'   => __DIR__.'/../vendor/bundles',
     ...........
 ));

```

Dependence
-----------------

Bundle depends on the library https://github.com/fightmaster/dao.You must install it.

