## About Scorecard
Scorecard is a modernized version of an Agricola online score card built by Mayfifteenth back in 2015. This new version will use JSON to build dynamic scorecards for any boardgames.

## Repository
searsandrew/scorecard.git

## Development Plans
- [X] Basic adding of friends
- [ ] Creating a game
- [ ] Inviting friends to join a game
- [ ] Users should be able to create new boardgame score cards (with permission)
- [ ] Auto give permission to create score cards with enough rep (talk about this)
- [X] Boardgames should include the [Board Game Geek](https://www.boardgamegeek.com/) game ID
- [X] Eventually it would be nice to pull game data from their XML API
- [ ] Designs for the front end

## Packages
- laravel/framework: 7.0
- laravel/ui: 2.0
- spatie/laravel-permission: 3.11

### Planned Packages
- laravel/sanctum: 2.4 - If moving to SPA frontend.
- league/flysystem-aws-s3-v3: 1.0
- spatie/laravel-tags: 2.6
- intervention/image: 2.5
- jenssegers/agent: 2.6
