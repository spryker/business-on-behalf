<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\BusinessOnBehalf\Checker;

use Generated\Shared\Transfer\CustomerTransfer;

class CompanyUserChecker implements CompanyUserCheckerInterface
{
    /**
     * @var array<\Spryker\Client\BusinessOnBehalfExtension\Dependency\Plugin\CompanyUserChangeAllowedCheckPluginInterface>
     */
    protected $companyUserChangeAllowedCheckPlugins;

    /**
     * @param array<\Spryker\Client\BusinessOnBehalfExtension\Dependency\Plugin\CompanyUserChangeAllowedCheckPluginInterface> $companyUserChangeAllowedCheckPlugins
     */
    public function __construct(array $companyUserChangeAllowedCheckPlugins)
    {
        $this->companyUserChangeAllowedCheckPlugins = $companyUserChangeAllowedCheckPlugins;
    }

    public function isCompanyUserChangeAllowed(CustomerTransfer $customerTransfer): bool
    {
        return $this->executeCompanyUserChangeAllowedCheckPlugins($customerTransfer);
    }

    protected function executeCompanyUserChangeAllowedCheckPlugins(CustomerTransfer $customerTransfer): bool
    {
        foreach ($this->companyUserChangeAllowedCheckPlugins as $companyUserChangeAllowedCheckPlugin) {
            if (!$companyUserChangeAllowedCheckPlugin->check($customerTransfer)) {
                return false;
            }
        }

        return true;
    }
}
