/*****************************************************************************
 gastax_data.js
 
******************************************************************************
 Written in 2004 by 
    Brian Douglas Skinner <brian.skinner@gumption.org>
  
 Copyright rights relinquished under the Creative Commons  
 Public Domain Dedication:
    http://creativecommons.org/licenses/publicdomain/
  
 You can copy freely from this file.  This work may be freely reproduced, 
 distributed, transmitted, used, modified, built upon, or otherwise exploited
 by anyone for any purpose.
  
 This work is provided on an "AS IS" basis, without warranties or conditions 
 of any kind, either express or implied, including, without limitation, any 
 warranties or conditions of title, non-infringement, merchantability, or 
 fitness for a particular purpose. You are solely responsible for determining 
 the appropriateness of using or distributing the work and assume all risks 
 associated with use of this work, including but not limited to the risks and 
 costs of errors, compliance with applicable laws, damage to or loss of data 
 or equipment, and unavailability or interruption of operations.

 In no event shall the authors or contributors have any liability for any 
 direct, indirect, incidental, special, exemplary, or consequential damages,
 however caused and on any theory of liability, whether in contract, strict 
 liability, or tort (including negligence), arising in any way out of or in 
 connection with the use or distribution of the work.
*****************************************************************************/

function makeGastaxDataVortex() {
  var metricAccounts = new Metric("Gas Tax Accounting", Datatype.MONEY);
  
  // Axes
  var axisYear = new Axis("Year");
  var axisCharity = new Axis("Charity");
  var axisAmount = new Axis("Amount");
  
  // Year buckets
  var bucketYear2001 = axisYear.makeNewBucket("2001");
  var bucketYear2002 = axisYear.makeNewBucket("2002");
  var bucketYear2003 = axisYear.makeNewBucket("2003");

  // Charity buckets
  var bucketCharityGreenbelt = axisCharity.makeNewBucket("Greenbelt Alliance");
  var bucketCharityITDP      = axisCharity.makeNewBucket("Inst. For TDP");
  var bucketCharityIBF       = axisCharity.makeNewBucket("Intl. Bike Fund");
  var bucketCharityNEI       = axisCharity.makeNewBucket("Nortwest Earth Inst.");
  var bucketCharityPlantIt   = axisCharity.makeNewBucket("Plant-it 2020");
  var bucketCharityRMI       = axisCharity.makeNewBucket("Rocky Mountain Inst.");
  var bucketCharityNature    = axisCharity.makeNewBucket("Nature Conservancy");
  var bucketCharityTrees     = axisCharity.makeNewBucket("Trees for the Future");
  var bucketCharityUCS       = axisCharity.makeNewBucket("Union of Con. Sci.");

  // Amount buckets
  var bucketAmountAnnualPledge   = axisAmount.makeNewBucket("Pledged this year");
  var bucketAmountAnnualDonation = axisAmount.makeNewBucket("Donated this year");
  var bucketAmountTotalPledge    = axisAmount.makeNewBucket("Pledged to date");
  var bucketAmountTotalDonation  = axisAmount.makeNewBucket("Donated to date");


  var gastaxDataVortex = new DataVortex([axisYear, axisCharity, axisAmount]);
  gastaxDataVortex.metricList.push(metricAccounts);
  
  // --------------
  // bucketYear2001
  // --------------
  gastaxDataVortex.setValue(metricAccounts,  61.46, [bucketYear2001, bucketCharityGreenbelt, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityGreenbelt, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,  61.46, [bucketYear2001, bucketCharityGreenbelt, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityGreenbelt, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,  92.18, [bucketYear2001, bucketCharityITDP, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityITDP, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,  92.18, [bucketYear2001, bucketCharityITDP, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityITDP, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 178.22, [bucketYear2001, bucketCharityIBF, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityIBF, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 178.22, [bucketYear2001, bucketCharityIBF, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityIBF, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2001, bucketCharityNEI, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2001, bucketCharityNEI, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2001, bucketCharityNEI, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2001, bucketCharityNEI, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityPlantIt, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityPlantIt, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityPlantIt, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityPlantIt, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityRMI, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityRMI, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityRMI, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityRMI, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityNature, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityNature, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityNature, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityNature, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityTrees, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityTrees, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts,  98.33, [bucketYear2001, bucketCharityTrees, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityTrees, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 135.20, [bucketYear2001, bucketCharityUCS, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityUCS, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 135.20, [bucketYear2001, bucketCharityUCS, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2001, bucketCharityUCS, bucketAmountTotalDonation])


  // --------------
  // bucketYear2002
  // --------------
  gastaxDataVortex.setValue(metricAccounts, 113.96, [bucketYear2002, bucketCharityGreenbelt, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2002, bucketCharityGreenbelt, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 175.42, [bucketYear2002, bucketCharityGreenbelt, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2002, bucketCharityGreenbelt, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 239.32, [bucketYear2002, bucketCharityITDP, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,  82.00, [bucketYear2002, bucketCharityITDP, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 331.50, [bucketYear2002, bucketCharityITDP, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 332.00, [bucketYear2002, bucketCharityITDP, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 199.43, [bucketYear2002, bucketCharityIBF, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 128.00, [bucketYear2002, bucketCharityIBF, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 377.65, [bucketYear2002, bucketCharityIBF, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 378.00, [bucketYear2002, bucketCharityIBF, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 113.96, [bucketYear2002, bucketCharityNEI, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 114.00, [bucketYear2002, bucketCharityNEI, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 113.96, [bucketYear2002, bucketCharityNEI, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 114.00, [bucketYear2002, bucketCharityNEI, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 170.94, [bucketYear2002, bucketCharityPlantIt, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,  19.00, [bucketYear2002, bucketCharityPlantIt, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 269.27, [bucketYear2002, bucketCharityPlantIt, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 269.00, [bucketYear2002, bucketCharityPlantIt, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 182.34, [bucketYear2002, bucketCharityRMI, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,  31.00, [bucketYear2002, bucketCharityRMI, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 280.67, [bucketYear2002, bucketCharityRMI, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 281.00, [bucketYear2002, bucketCharityRMI, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 182.34, [bucketYear2002, bucketCharityNature, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,  31.00, [bucketYear2002, bucketCharityNature, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 280.67, [bucketYear2002, bucketCharityNature, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 281.00, [bucketYear2002, bucketCharityNature, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 113.96, [bucketYear2002, bucketCharityTrees, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2002, bucketCharityTrees, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 212.29, [bucketYear2002, bucketCharityTrees, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2002, bucketCharityTrees, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 222.23, [bucketYear2002, bucketCharityUCS, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 107.00, [bucketYear2002, bucketCharityUCS, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 357.43, [bucketYear2002, bucketCharityUCS, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 357.00, [bucketYear2002, bucketCharityUCS, bucketAmountTotalDonation])

  
  // --------------
  // bucketYear2003
  // --------------
  gastaxDataVortex.setValue(metricAccounts,  84.10, [bucketYear2003, bucketCharityGreenbelt, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2003, bucketCharityGreenbelt, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 259.52, [bucketYear2003, bucketCharityGreenbelt, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityGreenbelt, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 105.72, [bucketYear2003, bucketCharityITDP, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityITDP, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 437.23, [bucketYear2003, bucketCharityITDP, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 582.00, [bucketYear2003, bucketCharityITDP, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 138.16, [bucketYear2003, bucketCharityIBF, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityIBF, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 515.82, [bucketYear2003, bucketCharityIBF, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 628.00, [bucketYear2003, bucketCharityIBF, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts,  84.10, [bucketYear2003, bucketCharityNEI, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2003, bucketCharityNEI, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 198.06, [bucketYear2003, bucketCharityNEI, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 114.00, [bucketYear2003, bucketCharityNEI, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 105.72, [bucketYear2003, bucketCharityPlantIt, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityPlantIt, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 375.00, [bucketYear2003, bucketCharityPlantIt, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 519.00, [bucketYear2003, bucketCharityPlantIt, bucketAmountTotalDonation])
  
  gastaxDataVortex.setValue(metricAccounts, 105.72, [bucketYear2003, bucketCharityRMI, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityRMI, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 386.39, [bucketYear2003, bucketCharityRMI, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 531.00, [bucketYear2003, bucketCharityRMI, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 116.54, [bucketYear2003, bucketCharityNature, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityNature, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 397.21, [bucketYear2003, bucketCharityNature, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 531.00, [bucketYear2003, bucketCharityNature, bucketAmountTotalDonation])
  
  gastaxDataVortex.setValue(metricAccounts, 105.72, [bucketYear2003, bucketCharityTrees, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts,   0.00, [bucketYear2003, bucketCharityTrees, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 318.02, [bucketYear2003, bucketCharityTrees, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityTrees, bucketAmountTotalDonation])

  gastaxDataVortex.setValue(metricAccounts, 127.35, [bucketYear2003, bucketCharityUCS, bucketAmountAnnualPledge])
  gastaxDataVortex.setValue(metricAccounts, 250.00, [bucketYear2003, bucketCharityUCS, bucketAmountAnnualDonation])
  gastaxDataVortex.setValue(metricAccounts, 484.78, [bucketYear2003, bucketCharityUCS, bucketAmountTotalPledge])
  gastaxDataVortex.setValue(metricAccounts, 607.00, [bucketYear2003, bucketCharityUCS, bucketAmountTotalDonation])

  return gastaxDataVortex;
}
