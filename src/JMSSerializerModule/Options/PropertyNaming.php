<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace JMSSerializerModule\Options;

use Laminas\Stdlib\AbstractOptions;

/**
 * Property naming options
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @author  Kyle Spraggs <theman@spiffyjr.me>
 */
class PropertyNaming extends AbstractOptions
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * @var string
     */
    protected string $separator = '_';

    /**
     * @var bool
     */
    protected bool $lowerCase = true;

    /**
     * @var bool
     */
    protected bool $enableCache = true;

    /**
     * @param string $cache
     *
     * @return self
     */
    public function setSeparator(string $cache)
    {
        $this->separator = $cache;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * @param bool $debug
     *
     * @return self
     */
    public function setLowercase(bool $debug): self
    {
        $this->lowerCase = $debug;
        return $this;
    }

    /**
     * @return bool
     */
    public function getLowercase(): bool
    {
        return $this->lowerCase;
    }

    /**
     * @param bool $inferTypesFromDoctrineMetadata
     *
     * @return self
     */
    public function setEnableCache(bool $inferTypesFromDoctrineMetadata): self
    {
        $this->enableCache = $inferTypesFromDoctrineMetadata;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableCache(): bool
    {
        return $this->enableCache;
    }
}
