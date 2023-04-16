<img alt="Botany Bay Logo" src="./assets/img/logo.svg" height="80px"/>

# Plant API
Botany Bay is an API that provides detailed information about plants. It is built using the Symfony 6.1 framework.

## API Endpoints

```
/plants
```
Returns information about all plants in the database. This endpoint accepts an id to fetch a specific record (`/plants/1`)

```
/species
```
Returns information about a specific plant species. You can either call this endpoint directly to get all species, or use a specific id (`/species/1`).

## Admin Backend
Botany Bay also comes with an admin backend where all the database entries and user accounts can be managed.

## Requirements
1. Symfony 6 cli
2. npm
3. docker
4. composer 2.x

## How to install

1. Clone the project
```
git clone https://github.com/kamephis/botany-bay-api.git
```
2. Spin up the database via docker
```
docker-composer -d
```
3. Install the composer packages
```
composer install
```
4. Install the node packages
```
npm i
```

## How to start the app (locally)
Start the symfony server
```
symfony server:start
```
Start npm / webpack
```
npm run watch
```

## License
This project is licensed under the GNU General Public License (GPL). See the [LICENSE](LICENSE) file for more details.
