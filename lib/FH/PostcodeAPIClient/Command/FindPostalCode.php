<?php

namespace FH\PostcodeAPIClient\Command;

/**
 * Command to retrieve geo-information for a given postal code and housenumber (optional).
 *
 * @author Joost Farla <joost.farla@freshheads.com>
 */
class FindPostalCode extends BaseApiCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        $this->request = $this->client->get();
        $url = $this->request->getUrl(true)->addPath($this->get('postal_code'));

        if ($this->get('house_number') !== null) {
            $url->addPath($this->get('house_number'));
        }

        $this->request->setUrl($url);
    }
}
