# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.2] - 2023-02-23

### Changed

- Fixed dark mode support (again!)
- Show user's email if there's no name (thanks to [@Meuss](https://github.com/Meuss))
- Updated packages

## [3.0.1] - 2022-08-11

### Changed

- Fixed dark mode support

## [3.0.0] - 2022-08-10

### Added

- Nova 4 support
- PHP 8 support

### Changed

- Renamed namespace from OptimistDigital to Outl1ne
- Dropped Nova 3 support
- Dropped PHP 7 support
- Updated packages

## [2.0.3] - 2021-12-14

### Changed

- Fixed Notes field not working on SoftDeleted models
- Updated packages

## [2.0.2] - 2021-09-03

### Changed

- Updated packages

## [2.0.1] - 2021-02-08

### Added

- Added option to use User attributes for avatar URLs (thanks to [@SimonBarrettACT](https://github.com/SimonBarrettACT))

### Changed

- Improved avatar URL fallbacks on Vue side
- Updated packages

## [2.0.0] - 2020-12-15

### Changed

- Dropped PHP 7.1, Laravel 6 and Nova 2 support
- Improved translations loading
- Fixed whole model being submitted on Firefox when adding a note
- Allow adding notes via "enter" key

## [1.5.8] - 2020-11-27

### Changed

- Improved `User` name handling
- Updated packages

## [1.5.7] - 2020-10-26

### Changed

- Fixed a typo leading to a plausible runtime exception
- Updated packages

## [1.5.6] - 2020-09-07

### Added

- Added `display_order` config option (thanks to [@SimonBarrettACT](https://github.com/SimonBarrettACT))

## [1.5.5] - 2020-09-04

### Added

- Added `fullWidth` option (thanks to [@SimonBarrettACT](https://github.com/SimonBarrettACT))
- Added ability to disable adding notes (thanks to [@SimonBarrettACT](https://github.com/SimonBarrettACT))

### Changed

- Updated packages

## [1.5.4] - 2020-09-04

### Changed

- Fix using Guard defined in Nova config to retrieve User class (thanks to [@adriandmitroca](https://github.com/adriandmitroca))

## [1.5.3] - 2020-09-02

### Changed

- Use Guard defined in Nova config to retrieve User class (thanks to [@adriandmitroca](https://github.com/adriandmitroca))

## [1.5.2] - 2020-09-02

### Changed

- Updated packages

## [1.5.1] - 2020-07-31

### Changed

- Fix runtime crash with Nova 3.8.0
- Improved error handling
- Disabled "add note" button when the input is empty
- Updated packages

## [1.5.0] - 2020-05-25

### Added

- Added custom `delete-nova-note` Gate that allows customizing deletion permissions

## [1.4.0] - 2020-04-17

### Added

- Added custom date format support
- Added optional trix field support

### Changed

- Update packages

## [1.3.2] - 2020-03-05

### Added

- Support Nova 3.0 in `composer.json` requirements

## [1.3.1] - 2020-02-19

### Added

- Added ability to provide custom notes model (`notes_model` in config)

## [1.3.0] - 2020-02-13

### Added

- Added localization support
- Added custom table name support (can be changed in the config)
- Allowed migration(s) publishing

### Changed

- Updated packages

## [1.2.0] - 2020-01-17

### Added

- Added config file w/ `get_avatar_url` configuration option

## [1.1.2] - 2019-12-18

### Changed

- Changed `text` column from `string` to `text` to increase its capacity (`php artisan migrate` required)
- Fixed profile image shrinking due to long content
- Updated packages

## [1.1.1] - 2019-10-24

### Changed

- Fixed resource saving

## [1.1.0] - 2019-10-24

### Changed

- Display the Notes field on update view
- Only allow the note creator to delete the note

## [1.0.2] - 2019-10-23

### Added

- Show only up to 5 notes initially with "show more" button to display all others

### Changed

- Improved sorting by adding note ID as tie-breaker in case multiple notes were created on the same second

## [1.0.1] - 2019-10-22

### Removed

- Removed `addActivity` method from `HasNotes` trait

## [1.0.0] - 2019-10-22

### Added

- Notes field on Detail view
- Differentiation between user-added and system-added notes
- Ability to add notes through the UI or programmatically
- Ability to delete user-made notes (w/ confirmation modal)
- Customizable placeholder support
