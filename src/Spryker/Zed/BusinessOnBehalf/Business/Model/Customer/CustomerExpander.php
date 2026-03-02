<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\BusinessOnBehalf\Business\Model\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\BusinessOnBehalf\Persistence\BusinessOnBehalfRepositoryInterface;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \Spryker\Zed\BusinessOnBehalf\Persistence\BusinessOnBehalfRepositoryInterface
     */
    protected $repository;

    public function __construct(BusinessOnBehalfRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $customerTransfer->requireIdCustomer();

        $customerTransfer->setIsOnBehalf(
            $this->repository->isOnBehalfByCustomerId(
                $customerTransfer->getIdCustomer(),
            ),
        );

        return $customerTransfer;
    }
}
