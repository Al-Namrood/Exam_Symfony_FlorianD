# EXAM_SYMFONY_FLORIAND

### Clone the repository with git
git clone https://github.com/Al-Namrood/Exam_Symfony_FlorianD.git

### To proceed to all the next steps go inside the project when cloning is finished.

### STEP 1
run
```
composer install
```

### STEP 2
* Create the file .env
* Copy and paste this
* Edit the db arguments (DATABASE_URL="mysql://dbuser:dbpassword@127.0.0.1:3306/dbname")

```
# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
#
# DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
#
# Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
# https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=1e9ce4e447936e5bd92ea83c9d728a52
###< symfony/framework-bundle ###

###> symfony/mailer ###
# MAILER_DSN=smtp://localhost
###< symfony/mailer ###

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
DATABASE_URL="mysql://dbuser:dbpassword@127.0.0.1:3306/dbname"
#DATABASE_URL="postgresql://symfony:ChangeMe@127.0.0.1:5432/app?serverVersion=13&charset=utf8"
###< doctrine/doctrine-bundle ###

```

### Step 3

Update the entity for the project
```
php bin/console d:s:u --force
```

### Step 4

Run

```
symfony server:start
```