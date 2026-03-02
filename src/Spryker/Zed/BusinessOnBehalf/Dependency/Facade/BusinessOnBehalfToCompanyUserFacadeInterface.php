<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\BusinessOnBehalf\Dependency\Facade;

use Generated\Shared\Transfer\CompanyUserTransfer;

interface BusinessOnBehalfToCompanyUserFacadeInterface
{
    public function getCompanyUserById(int $idCompanyUser): CompanyUserTransfer;
}
