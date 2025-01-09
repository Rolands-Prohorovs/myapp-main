# myapp

# to start docker containers (php, mysql, phpmyadmin) 
```bash
docker compose up -d
```

# to visit project:
* web - https://localhost
* phpmyadmin - http://localhost:8080

# remember commit often
```bash
git commit -am "wip"
```

# composer commands
https://github.com/ords/Citadaskola-2023/discussions/12

```bash
docker run --rm -it \
--volume /$PWD:/app \
--user $(id -u):$(id -g) \
composer <command>
```