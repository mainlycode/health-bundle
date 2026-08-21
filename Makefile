.DEFAULT_GOAL:=help

.PHONY: dependencies
dependencies: ## Install Composer dependencies
	composer install --no-interaction --ansi

.PHONY: test
test: ## Run the test suite
	vendor/bin/phpunit --testdox

.PHONY: coverage
coverage: ## Report the test coverage
	vendor/bin/phpunit --coverage-text

.PHONY: phpstan
phpstan: ## Run static analysis
	vendor/bin/phpstan analyse --no-progress

.PHONY: audit
audit: ## Check dependencies for known security vulnerabilities
	composer audit --no-interaction --ansi

.PHONY: qa
qa: phpstan test audit ## Run all quality assurance checks

# Based on https://suva.sh/posts/well-documented-makefiles/
.PHONY: help
help: ## Display this help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-16s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)
