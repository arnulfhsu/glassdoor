<?php

namespace Glassdoor\Tests\Fixture;

class JobProgression {
  public static function getResponseBody() {
    return [
      "success" =>  true,
      "status" => "OK",
      "jsessionid" =>  "017E1E68702DDD8474E7153DF194D6D3",
      "response" =>  [
        "attributionURL" => "http://www.glassdoor.com/api/json/search/jobProgression.htm?countryId=1&amp;apiUserAgent=&amp;v=1&amp;apiUserIpAddress=0.0.0.0&amp;format=json&amp;t.k=jEkeuXwWp6s&amp;jobTitle=cashier",
        "jobTitle" => "cashier",
        "payCurrencyCode" => "USD",
        "payCurrencySymbol" =>  "$",
        "payLow" => 10323,
        "payMedian" => 19425,
        "payHigh" => 31897,
        "results" => [
          [
            "nextJobTitle" => "sales associate",
            "frequency" => 3593,
            "frequencyPercent" => 26.473622163277337,
            "nationalJobCount" => 179184,
            "medianSalary" => 35000
          ],
          [
            "nextJobTitle" => "receptionist",
            "frequency" => 1640,
            "frequencyPercent" => 12.083701738874153,
            "nationalJobCount" => 87558,
            "medianSalary" => 30000
          ],
          [
            "nextJobTitle" => "administrative assistant",
            "frequency" => 1011,
            "frequencyPercent" => 7.4491600353669325,
            "nationalJobCount" => 39258,
            "medianSalary" => 39500
          ]
        ]
      ]
    ];
  }
}