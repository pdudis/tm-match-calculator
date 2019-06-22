# tm-match-calculator
Calculate the weighted word count and payment of translation projects.

**Screenshot:**
![TM Matrix Calculator Screenshot](https://www.translators-tech-help.com/TM-Matrix-Calculator-Screenshot-Small.png)

# Requirements
Since this is coded in PHP, you'll either need a [LAMP](https://en.wikipedia.org/wiki/LAMP_(software_bundle))-type environment or a live hosting space with PHP support.

## Description
In the Translation Industry, the most frequently used method of quantifying the work involved is word counting. With CAT (Computer-Assisted Translation) Tools, word counts take a totally new twist. Rather than simply counting total words in a file, CAT Tools allow for more in-depth statistics, such as Repetitions, 100% Matches, Context Matches, Fuzzy Matches and No Matches. All these provide a comprehensive report of a project’s translation status. In simpler words, we get a detailed picture of how much work is involved, or how much has been completed up to this point. These statistics are usually called a TM (Translation Memory) Analysis or a TM Log, and are provided with every translation project that requires the use of a CAT Tool.

### The Trados Discount Model
A side effect of the TM Analysis capability was the introduction -- by translation agencies -- of the Trados Discount Model. It was named that way for two reasons:

1. Trados Workbench was the dominant CAT Tool of that period.
2. It applied a discount payment based on TM Match categories.

Lately, you can also see it mentioned as the TM Match Discount Model or a Match Matrix which better describe its purpose.

Basically, this discount model does the following: It assigns different charging rates per TM Match category, allocating a full charging rate for No Matches and lowering that rate as the TM Matches move to Fuzzy Matches, 100% Matches and Repetitions. The concept behind this is that you work less on some TM Match categories than on others, so you should be paid accordingly.

Let me show you an example of such a TM Match Discount Model:

![TM Match Discount Model](https://www.translators-tech-help.com/images/TM_Match_Discount_Model.png)

The above table is one of the popular models applied by translation agencies, but you’ll surely find a lot of variations to it.

Let me remind you that the Fuzzy Matches above contain the TM Match group of 75% - 99%, thus the No Matches above have a TM Match group of 0% - 74%. Don’t confuse the TM Match percentage categories to the charging rate percentage! The first concerns TM Matches which is similarity of the segments, and the latter refers to payment percent per those TM Match categories.

You might be wondering why there’s a 0% charge for the Context Matches and not at least a 25% charge as is the case with the 100% Matches in the above example. A Context Match is a “safe” 100% Match, which means it’s bound to be correct and no further review or editing is required to it. In contrast with the 100% Matches, which need a quick review to ensure that they’re inline with the remaining context, thus the 25% payment for this effort.

Now let’s see an actual example with a random word count and some money involved! We’ll assume a rate of $0.10 per word and I’ll use the full TM Match category breakdown. Also, I’ll add an extra column titled “Calculation” so I can show you the behind-the-scenes math involved:

![TM Match Category Breakdown](https://www.translators-tech-help.com/images/TM_Match_Category_Breakdown.png)

In the above example, we earn a total of $398.10 for this translation job. If the client hadn’t requested the use of the TM Match Discount model (or hadn’t required the use of a CAT Tool), the payment would’ve been $480.10 (4801 total words x $0.10 per word). But, you shouldn’t feel cheated here. You might be working with a total of 4801 words, but the CAT Tool has relieved you of a lot of work when dealing with the Fuzzy and 100% Matches, as well as with the Repetitions. Plus, the Context Matches are a zero effort thing, since you don’t have to touch them.

### Weighted Words
Sometimes it’s quite handy to get an idea of a project’s volume and its TM Match statistics just by looking at a single figure. It also uncomplicates the financial side of things, since only a single number has to be used and get multiplied by your word rate. That’s where weighted word counts come in.

Weighted words have gained a lot of traction lately, and are provided along with the usual TM log so you can have the best possible picture of a project’s volume. This magic number is achievable by applying a statistical formula to two key components: the charging rate percentage per TM Match category and the word count per that TM Match category. By multiplying these two components you get a weighted word count result.

Are you still with me? Let’s put this into an example that will clarify things a bit. I’ll use the same word count from the previous example:

![TM Match Analysis](https://www.translators-tech-help.com/images/TM_Match_Analysis.png)

So by applying the simple formula **[Money Charge Rate] x [Word Count]** per TM Match category we get a weighted word count per that TM Match category, and by adding them all up you obtain that precious single figure we’re talking about all this time.

Now let’s verify what we’ve said earlier on, that if you multiply the weighted word count by your translation word rate you will get the project’s total cost. I’ll juxtapose the numbers from the first example so we can make the comparison easier:

- **Example 1 Results:** Project Cost: $398.10 Calculation Method: TM Log
- **Example 2 Results:** Project Cost: $398.10 Calculation Method: [Weighted Word Count] x [Word Rate] = (3981 x 0.10)

No surprises here. The project’s cost matches in both cases.

Note that weighted words can only exist when using a CAT Tool. This should be obvious to you by now, since the components for calculating a weighted word count rely on TM Match categories.
