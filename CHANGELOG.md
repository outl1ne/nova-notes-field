# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
