<?php

use App\Category;
use App\Group;
use Illuminate\Database\Seeder;

class GroupCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();

        foreach (Group::groups() as $group) {
            $group = Group::create(['group_name' => $group]);
            foreach (Category::categories() as $category) {
                Category::create([
                    'group_id' => $group->id,
                    'category_name' => $category,
                ]);
            }
        }

       $values = [
           ['category_id' => 1, 'checklist' => 'Begins to smile at people'],
           ['category_id' => 1, 'checklist' => 'Can briefly calm himself (may bring hands to mouth and suck on hand)'],
           ['category_id' => 1, 'checklist' => 'Tries to look at parent'],
           ['category_id' => 2, 'checklist' => 'Coos, makes gurgling sounds'],
           ['category_id' => 2, 'checklist' => 'Turns head toward sounds'],
           ['category_id' => 3, 'checklist' => 'Pays attention to faces'],
           ['category_id' => 3, 'checklist' => 'Begins to follow things with eyes and recognize people at
a distance'],
           ['category_id' => 3, 'checklist' => 'Begins to act bored (cries, fussy) if activity doesn’t change'],
           ['category_id' => 4, 'checklist' => 'Can hold head up and begins to push up when lying on tummy'],
           ['category_id' => 4, 'checklist' => 'Makes smoother movements with arms and legs'],
           ['category_id' => 5, 'checklist' => 'Cuddle, talk, and play with your baby during feeding,
dressing, and bathing'],
           ['category_id' => 5, 'checklist' => 'Help your baby learn to calm herself. It’s okay for
her to suck on her fingers'],
           ['category_id' => 5, 'checklist' => 'Begin to help your baby get into a routine,
such as sleeping at night more than in the day,
and have regular schedules.'],
           ['category_id' => 5, 'checklist' => 'Getting in tune with your baby’s likes and dislikes
can help you feel more comfortable and confident.'],
           ['category_id' => 5, 'checklist' => 'Act excited and smile when your baby
makes sounds.'],
           ['category_id' => 5, 'checklist' => ' Copy your baby’s sounds sometimes, but also use
clear language'],
           ['category_id' => 5, 'checklist' => 'Pay attention to your baby’s different cries so that
you learn to know what he wants.'],
           ['category_id' => 5, 'checklist' => 'Talk, read, and sing to your baby.'],
           ['category_id' => 5, 'checklist' => 'Play peek-a-boo. Help your baby play
peek-a-boo, too.'],
           ['category_id' => 5, 'checklist' => 'Place a baby-safe mirror in your baby’s crib so
she can look at herself'],
           ['category_id' => 5, 'checklist' => 'Look at pictures with your baby and talk
about them'],
           ['category_id' => 5, 'checklist' => 'Lay your baby on his tummy when he is awake
and put toys near him.'],
           ['category_id' => 5, 'checklist' => 'Encourage your baby to lift his head by holding
toys at eye level in front of him.'],
           ['category_id' => 5, 'checklist' => 'Hold a toy or rattle above your baby’s head and
encourage her to reach for it'],
           ['category_id' => 5, 'checklist' => 'Hold your baby upright with his feet on the floor.
Sing or talk to your baby as he is upright'],
           ['category_id' => 6, 'checklist' => 'Smiles spontaneously, especially at people'],
           ['category_id' => 6, 'checklist' => 'Likes to play with people and might cry when playing stops'],
           ['category_id' => 6, 'checklist' => 'Copies some movements and facial expressions, like smiling
or frowning'],
           ['category_id' => 7, 'checklist' => ' Begins to babble'],
           ['category_id' => 7, 'checklist' => 'Babbles with expression and copies sounds he hears'],
           ['category_id' => 7, 'checklist' => 'Cries in different ways to show hunger, pain, or being tired'],
           ['category_id' => 8, 'checklist' => 'Lets you know if she is happy or sad'],
           ['category_id' => 8, 'checklist' => 'Responds to affection'],
           ['category_id' => 8, 'checklist' => 'Reaches for toy with one hand'],
           ['category_id' => 8, 'checklist' => ' Uses hands and eyes together, such as seeing a toy
and reaching for it'],
           ['category_id' => 8, 'checklist' => 'Follows moving things with eyes from side to side'],
           ['category_id' => 8, 'checklist' => 'Watches faces closely'],
           ['category_id' => 8, 'checklist' => 'Recognizes familiar people and things at a distance'],
           ['category_id' => 9, 'checklist' => 'Holds head steady, unsupported'],
           ['category_id' => 9, 'checklist' => 'Pushes down on legs when feet are on a hard surface'],
           ['category_id' => 9, 'checklist' => 'May be able to roll over from tummy to back'],
           ['category_id' => 9, 'checklist' => 'Can hold a toy and shake it and swing at dangling toys'],
           ['category_id' => 9, 'checklist' => 'Brings hands to mouth'],
           ['category_id' => 9, 'checklist' => 'When lying on stomach, pushes up to elbows'],
           ['category_id' => 10, 'checklist' => 'Hold and talk to your baby; smile and be cheerful while you do'],
           ['category_id' => 10, 'checklist' => 'Set steady routines for sleeping and feeding.'],
           ['category_id' => 10, 'checklist' => ' Pay close attention to what your baby likes and doesn’t like; you will know how best to meet his needs and what you can do to make your
baby happy.'],
           ['category_id' => 10, 'checklist' => 'Copy your baby’s sounds'],
           ['category_id' => 10, 'checklist' => 'Act excited and smile when your baby makes
sounds'],
           ['category_id' => 10, 'checklist' => 'Have quiet play times when you read or sing to
your baby'],
           ['category_id' => 10, 'checklist' => 'Give age-appropriate toys to play with, such as
rattles or colorful pictures'],
           ['category_id' => 10, 'checklist' => 'Play games such as peek-a-boo.'],
           ['category_id' => 10, 'checklist' => 'Provide safe opportunities for your baby to reach
for toys and explore his surroundings.'],
           ['category_id' => 10, 'checklist' => 'Put toys near your baby so that she can reach for
them or kick her feet'],
           ['category_id' => 10, 'checklist' => 'Put toys or rattles in your baby’s hand and help
him to hold them'],
           ['category_id' => 10, 'checklist' => 'Hold your baby upright with feet on the floor,
and sing or talk to your baby as she “stands”
with support.'],
           ['category_id' => 11, 'checklist' => 'Knows familiar faces and begins to know if someone is
a stranger'],
           ['category_id' => 11, 'checklist' => 'Likes to play with others, especially parents'],
           ['category_id' => 11, 'checklist' => 'Responds to other people’s emotions and often seems happy'],
           ['category_id' => 11, 'checklist' => 'Likes to look at self in a mirror'],
           ['category_id' => 12, 'checklist' => 'Responds to sounds by making sounds'],
           ['category_id' => 12, 'checklist' => 'Strings vowels together when babbling (“ah,” “eh,” “oh”)
and likes taking turns with parent while making sounds'],
           ['category_id' => 12, 'checklist' => 'Responds to own name'],
           ['category_id' => 12, 'checklist' => 'Makes sounds to show joy and displeasure'],
           ['category_id' => 12, 'checklist' => 'Begins to say consonant sounds (jabbering with “m,” “b”)'],
           ['category_id' => 13, 'checklist' => 'Looks around at things nearby'],
           ['category_id' => 13, 'checklist' => 'Brings things to mouth'],
           ['category_id' => 13, 'checklist' => 'Shows curiosity about things and tries to get things that are
out of reach'],
           ['category_id' => 13, 'checklist' => 'Begins to pass things from one hand to the other'],
           ['category_id' => 14, 'checklist' => 'Rolls over in both directions (front to back, back to front)'],
           ['category_id' => 14, 'checklist' => 'Begins to sit without support'],
           ['category_id' => 14, 'checklist' => 'When standing, supports weight on legs and might bounce'],
           ['category_id' => 14, 'checklist' => 'Rocks back and forth, sometimes crawling backward before
moving forward'],
           ['category_id' => 15, 'checklist' => 'Play on the floor with your baby every day'],
           ['category_id' => 15, 'checklist' => 'Learn to read your baby’s moods. If he’s happy,
keep doing what you are doing. If he’s upset, take a
break and comfort your baby'],
           ['category_id' => 15, 'checklist' => 'Show your baby how to comfort herself when she’s
upset. She may suck on her fingers to self soothe.'],
           ['category_id' => 15, 'checklist' => 'Use “reciprocal” play—when he smiles, you smile;
when he makes sounds, you copy them'],
           ['category_id' => 15, 'checklist' => 'Repeat your child’s sounds and say simple words
with those sounds. For example, if your child says
“bah,” say “bottle” or “book.”'],
           ['category_id' => 15, 'checklist' => 'Read books to your child every day. Praise her when
she babbles and “reads” too'],
           ['category_id' => 15, 'checklist' => 'When your baby looks at something, point to it and
talk about it'],
           ['category_id' => 15, 'checklist' => 'When he drops a toy on the floor, pick it up and give
it back. This game helps him learn cause and effect.'],
           ['category_id' => 15, 'checklist' => 'Read colorful picture books to your baby.'],
           ['category_id' => 15, 'checklist' => 'Point out new things to your baby and name them'],
           ['category_id' => 15, 'checklist' => 'Show your baby bright pictures in a magazine and
name them'],
           ['category_id' => 15, 'checklist' => 'Hold your baby up while she sits or support her
with pillows. Let her look around and give her toys
to look at while she balances'],
           ['category_id' => 15, 'checklist' => 'Put your baby on his tummy or back and put toys
just out of reach. Encourage him to roll over to reach
the toys.'],
           ['category_id' => 16, 'checklist' => 'May be afraid of strangers'],
           ['category_id' => 16, 'checklist' => 'May be clingy with familiar adults'],
           ['category_id' => 16, 'checklist' => 'Has favorite toys'],
           ['category_id' => 17, 'checklist' => 'Understands “no”'],
           ['category_id' => 17, 'checklist' => 'Makes a lot of different sounds like “mamamama” and
“bababababa”'],
           ['category_id' => 17, 'checklist' => 'Copies sounds and gestures of others'],
           ['category_id' => 17, 'checklist' => 'Uses fingers to point at things'],
           ['category_id' => 18, 'checklist' => 'Watches the path of something as it falls'],
           ['category_id' => 18, 'checklist' => 'Looks for things he sees you hide'],
           ['category_id' => 18, 'checklist' => 'Plays peek-a-boo'],
           ['category_id' => 18, 'checklist' => 'Puts things in her mouth'],
           ['category_id' => 18, 'checklist' => 'Moves things smoothly from one hand to the other'],
           ['category_id' => 18, 'checklist' => 'Picks up things like cereal o’s between thumb and index finger'],
           ['category_id' => 19, 'checklist' => 'Stands, holding on'],
           ['category_id' => 19, 'checklist' => 'Can get into sitting position'],
           ['category_id' => 19, 'checklist' => 'Sits without support'],
           ['category_id' => 19, 'checklist' => 'Pulls to stand'],
           ['category_id' => 19, 'checklist' => 'Crawls'],
           ['category_id' => 20, 'checklist' => 'Pay attention to the way he reacts to new situations
and people; try to continue to do things that make
your baby happy and comfortable.'],
           ['category_id' => 20, 'checklist' => ' As she moves around more, stay close so she knows
that you are near'],
           ['category_id' => 20, 'checklist' => ' Continue with routines; they are especially
important now.'],
           ['category_id' => 20, 'checklist' => 'Play games with “my turn, your turn.”'],
           ['category_id' => 20, 'checklist' => 'Say what you think your baby is feeling. For example,
say, “You are so sad, let’s see if we can make you
feel better.”'],
           ['category_id' => 20, 'checklist' => 'Describe what your baby is looking at; for example,
“red, round ball.”'],
           ['category_id' => 20, 'checklist' => 'Talk about what your baby wants when he points
at something'],
           ['category_id' => 20, 'checklist' => 'Copy your baby’s sounds and words'],
           ['category_id' => 20, 'checklist' => 'Ask for behaviors that you want. For example,
instead of saying “don’t stand,” say “time to sit.”'],
           ['category_id' => 20, 'checklist' => 'Teach cause-and-effect by rolling balls back and
forth, pushing toy cars and trucks, and putting blocks
in and out of a container'],
           ['category_id' => 20, 'checklist' => 'Play peek-a-boo and hide-and-seek'],
           ['category_id' => 20, 'checklist' => 'Read and talk to your baby'],
           ['category_id' => 20, 'checklist' => 'Provide lots of room for your baby to move and
explore in a safe area.'],
           ['category_id' => 20, 'checklist' => 'Put your baby close to things that she can pull up
on safely.'],
           ['category_id' => 21, 'checklist' => 'Is shy or nervous with strangers'],
           ['category_id' => 21, 'checklist' => 'Cries when mom or dad leaves'],
           ['category_id' => 21, 'checklist' => 'Has favorite things and people'],
           ['category_id' => 21, 'checklist' => 'Shows fear in some situations'],
           ['category_id' => 21, 'checklist' => 'Hands you a book when he wants to hear a story'],
           ['category_id' => 21, 'checklist' => 'Repeats sounds or actions to get attention'],
           ['category_id' => 21, 'checklist' => 'Puts out arm or leg to help with dressing'],
           ['category_id' => 21, 'checklist' => 'plays games such as “peek-a-boo” and “pat-a-cake”'],
           ['category_id' => 22, 'checklist' => 'Responds to simple spoken requests'],
           ['category_id' => 22, 'checklist' => 'o Uses simple gestures, like shaking head “no”
or waving “bye-bye”'],
           ['category_id' => 22, 'checklist' => 'Makes sounds with changes in tone (sounds more like speech)'],
           ['category_id' => 22, 'checklist' => 'Says “mama” and “dada” and exclamations like “uh-oh!”'],
           ['category_id' => 22, 'checklist' => 'Tries to say words you say'],
           ['category_id' => 23, 'checklist' => 'Explores things in different ways, like shaking,
banging, throwing'],
           ['category_id' => 23, 'checklist' => 'Finds hidden things easily'],
           ['category_id' => 23, 'checklist' => 'Looks at the right picture or thing when it’s named'],
           ['category_id' => 23, 'checklist' => 'Copies gestures'],
           ['category_id' => 23, 'checklist' => 'Starts to use things correctly; for example, drinks from
a cup, brushes hair'],
           ['category_id' => 23, 'checklist' => 'Bangs two things together'],
           ['category_id' => 23, 'checklist' => 'Puts things in a container, takes things out of a container'],
           ['category_id' => 23, 'checklist' => 'Lets things go without help'],
           ['category_id' => 23, 'checklist' => 'Pokes with index (pointer) finger'],
           ['category_id' => 23, 'checklist' => 'Follows simple directions like “pick up the toy”'],
           ['category_id' => 24, 'checklist' => 'Gets to a sitting position without help'],
           ['category_id' => 24, 'checklist' => 'Pulls up to stand, walks holding on to furniture (“cruising”)'],
           ['category_id' => 24, 'checklist' => 'May take a few steps without holding on'],
           ['category_id' => 24, 'checklist' => 'May stand alone'],
           ['category_id' => 25, 'checklist' => 'Give your child time to get to know a new caregiver.
Bring a favorite toy, stuffed animal, or blanket to help
comfort your child'],
           ['category_id' => 25, 'checklist' => 'In response to unwanted behaviors, say “no” firmly.
Do not yell, spank, or give long explanations. A time
out for 30 seconds to 1 minute might help redirect
your child.'],
           ['category_id' => 25, 'checklist' => 'Give your child lots of hugs, kisses, and praise for
good behavior'],
           ['category_id' => 25, 'checklist' => 'Spend a lot more time encouraging wanted behaviors
than punishing unwanted behaviors (4 times as much
encouragement for wanted behaviors as redirection
for unwanted behaviors).'],
           ['category_id' => 25, 'checklist' => 'Talk to your child about what you’re doing. For
example, “Mommy is washing your hands with a
washcloth.”'],
           ['category_id' => 25, 'checklist' => 'Read with your child every day. Have your child
turn the pages. Take turns labeling pictures with
your child'],
           ['category_id' => 25, 'checklist' => 'Build on what your child says or tries to say, or
what he points to. If he points to a truck and says
“t” or “truck,” say, “Yes, that’s a big, blue truck.”'],
           ['category_id' => 25, 'checklist' => 'Give your child crayons and paper, and let your child
draw freely. Show your child how to draw lines up
and down and across the page. Praise your child when she tries to copy them.'],
           ['category_id' => 25, 'checklist' => 'Play with blocks, shape sorters, and other toys that
encourage your child to use his hands'],
           ['category_id' => 25, 'checklist' => 'Hide small toys and other things and have your
child find them'],
           ['category_id' => 25, 'checklist' => 'Ask your child to label body parts or things you see
while driving in the car'],
           ['category_id' => 25, 'checklist' => 'Sing songs with actions, like “The Itsy Bitsy Spider”
and “Wheels on the Bus.” Help your child do the
actions with you'],
           ['category_id' => 25, 'checklist' => 'Give your child pots and pans or a small musical
instrument like a drum or cymbals. Encourage your
child to make noise.'],
           ['category_id' => 25, 'checklist' => 'Provide lots of safe places for your toddler to explore.
(Toddler-proof your home. Lock away products for
cleaning, laundry, lawn care, and car care. Use a safety
gate and lock doors to the outside and the basement.)'],
           ['category_id' => 25, 'checklist' => 'Give your child push toys like a wagon or “kiddie
push car.”'],
           ['category_id' => 26, 'checklist' => 'Likes to hand things to others as play'],
           ['category_id' => 26, 'checklist' => 'May have temper tantrums'],
           ['category_id' => 26, 'checklist' => 'May be afraid of strangers'],
           ['category_id' => 26, 'checklist' => 'Shows affection to familiar people'],
           ['category_id' => 26, 'checklist' => 'Plays simple pretend, such as feeding a doll'],
           ['category_id' => 26, 'checklist' => 'May cling to caregivers in new situations'],
           ['category_id' => 26, 'checklist' => 'Points to show others something interesting'],
           ['category_id' => 26, 'checklist' => 'Explores alone but with parent close by'],
           ['category_id' => 27, 'checklist' => 'Says several single words'],
           ['category_id' => 27, 'checklist' => 'Says and shakes head “no”'],
           ['category_id' => 27, 'checklist' => 'Points to show someone what he wants'],
           ['category_id' => 28, 'checklist' => 'Knows what ordinary things are for; for example, telephone,
brush, spoon'],
           ['category_id' => 28, 'checklist' => 'Points to get the attention of others'],
           ['category_id' => 28, 'checklist' => 'Shows interest in a doll or stuffed animal by pretending to feed'],
           ['category_id' => 28, 'checklist' => 'Points to one body part'],
           ['category_id' => 28, 'checklist' => 'Scribbles on his own'],
           ['category_id' => 28, 'checklist' => 'Can follow 1-step verbal commands without any gestures;
for example, sits when you say “sit down”
'],
           ['category_id' => 29, 'checklist' => 'Walks alone'],
           ['category_id' => 29, 'checklist' => 'May walk up steps and run'],
           ['category_id' => 29, 'checklist' => 'Pulls toys while walking'],
           ['category_id' => 29, 'checklist' => 'Can help undress herself'],
           ['category_id' => 29, 'checklist' => 'Drinks from a cup'],
           ['category_id' => 29, 'checklist' => 'Eats with a spoon'],
           ['category_id' => 30, 'checklist' => 'Provide a safe, loving environment. It’s important
to be consistent and predictable.'],
           ['category_id' => 30, 'checklist' => 'Praise good behaviors more than you punish bad
behaviors (use only very brief time outs).'],
           ['category_id' => 30, 'checklist' => 'Describe her emotions. For example, say, “You are
happy when we read this book.”'],
           ['category_id' => 30, 'checklist' => 'Encourage pretend play'],
           ['category_id' => 30, 'checklist' => 'Encourage empathy. For example, when he sees a
child who is sad, encourage him to hug or pat the
other child'],
           ['category_id' => 30, 'checklist' => 'Read books and talk about the pictures using
simple words.'],
           ['category_id' => 30, 'checklist' => 'Copy your child’s words'],
           ['category_id' => 30, 'checklist' => 'Use words that describe feelings and emotions'],
           ['category_id' => 30, 'checklist' => 'Use simple, clear phrases'],
           ['category_id' => 30, 'checklist' => 'Ask simple questions.'],
           ['category_id' => 30, 'checklist' => 'Hide things under blankets and pillows and
encourage him to find them'],
           ['category_id' => 30, 'checklist' => 'Play with blocks, balls, puzzles, books, and toys
that teach cause and effect and problem solving.'],
           ['category_id' => 30, 'checklist' => 'Name pictures in books and body parts.'],
           ['category_id' => 30, 'checklist' => 'Provide toys that encourage pretend play; for
example, dolls, play telephones'],
           ['category_id' => 30, 'checklist' => 'Provide safe areas for your child to walk and
move around in'],
           ['category_id' => 30, 'checklist' => 'Provide toys that she can push or pull safely'],
           ['category_id' => 30, 'checklist' => 'Provide balls for her to kick, roll, and throw'],
           ['category_id' => 30, 'checklist' => 'Encourage him to drink from his cup and use a
spoon, no matter how messy'],
           ['category_id' => 30, 'checklist' => 'Blow bubbles and let your child pop them'],
           ['category_id' => 31, 'checklist' => 'Copies others, especially adults and older children'],
           ['category_id' => 31, 'checklist' => 'Gets excited when with other children'],
           ['category_id' => 31, 'checklist' => 'Shows more and more independence'],
           ['category_id' => 31, 'checklist' => 'Shows defiant behavior (doing what he has been told not to)'],
           ['category_id' => 31, 'checklist' => 'Plays mainly beside other children, but is beginning
to include other children, such as in chase games'],
           ['category_id' => 32, 'checklist' => 'Points to things or pictures when they are named'],
           ['category_id' => 32, 'checklist' => 'Knows names of familiar people and body parts'],
           ['category_id' => 32, 'checklist' => 'Says sentences with 2 to 4 words'],
           ['category_id' => 32, 'checklist' => 'Follows simple instructions'],
           ['category_id' => 32, 'checklist' => 'Repeats words overheard in conversation'],
           ['category_id' => 32, 'checklist' => 'Points to things in a book'],
           ['category_id' => 33, 'checklist' => 'Finds things even when hidden under two or three covers'],
           ['category_id' => 33, 'checklist' => 'Begins to sort shapes and colors'],
           ['category_id' => 33, 'checklist' => 'Completes sentences and rhymes in familiar books'],
           ['category_id' => 33, 'checklist' => 'Plays simple make-believe games'],
           ['category_id' => 33, 'checklist' => 'Builds towers of 4 or more blocks'],
           ['category_id' => 33, 'checklist' => ' Might use one hand more than the other'],
           ['category_id' => 33, 'checklist' => 'Follows two-step instructions such as “Pick up your shoes
and put them in the closet.”'],
           ['category_id' => 33, 'checklist' => 'Names items in a picture book such as a cat, bird, or dog'],
           ['category_id' => 34, 'checklist' => 'Stands on tiptoe'],
           ['category_id' => 34, 'checklist' => 'Kicks a ball'],
           ['category_id' => 34, 'checklist' => 'Begins to run'],
           ['category_id' => 34, 'checklist' => 'Climbs onto and down from furniture without help'],
           ['category_id' => 34, 'checklist' => 'Walks up and down stairs holding on'],
           ['category_id' => 34, 'checklist' => 'Throws ball overhand'],
           ['category_id' => 34, 'checklist' => 'Makes or copies straight lines and circles'],
           ['category_id' => 35, 'checklist' => 'Encourage your child to help with simple chores at
home, like sweeping and making dinner. Praise your
child for being a good helper.'],
           ['category_id' => 35, 'checklist' => 'At this age, children still play next to (not with) each
other and don’t share well. For play dates, give the
children lots of toys to play with. Watch the children
closely and step in if they fight or argue.'],
           ['category_id' => 35, 'checklist' => 'Give your child attention and praise when he follows
instructions. Limit attention for defiant behavior.
Spend a lot more time praising good behaviors than
punishing bad ones.'],
           ['category_id' => 35, 'checklist' => 'Teach your child to identify and say body parts,
animals, and other common things.'],
           ['category_id' => 35, 'checklist' => 'Do not correct your child when he says words
incorrectly. Rather, say it correctly. For example,
“That is a ball.”'],
           ['category_id' => 35, 'checklist' => 'Encourage your child to say a word instead of
pointing. If your child can’t say the whole word
(“milk”), give her the first sound (“m”) to help.
Over time, you can prompt your child to say the
whole sentence — “I want milk.”'],
           ['category_id' => 35, 'checklist' => 'Hide your child’s toys around the room and let him
find them'],
           ['category_id' => 35, 'checklist' => 'Help your child do puzzles with shapes, colors, or
farm animals. Name each piece when your child
puts it in place.'],
           ['category_id' => 35, 'checklist' => 'Encourage your child to play with blocks. Take turns
building towers and knocking them down.'],
           ['category_id' => 35, 'checklist' => 'Do art projects with your child using crayons, paint,
and paper. Describe what your child makes and
hang it on the wall or refrigerator.'],
           ['category_id' => 35, 'checklist' => 'Ask your child to help you open doors and drawers
and turn pages in a book or magazine.'],
           ['category_id' => 35, 'checklist' => 'Once your child walks well, ask her to carry small
things for you.'],
           ['category_id' => 35, 'checklist' => 'Kick a ball back and forth with your child. When your
child is good at that, encourage him to run and kick'],
           ['category_id' => 35, 'checklist' => 'Take your child to the park to run and climb on
equipment or walk on nature trails. Watch your
child closely'],
           ['category_id' => 36, 'checklist' => 'Copies adults and friends'],
           ['category_id' => 36, 'checklist' => 'Shows affection for friends without prompting'],
           ['category_id' => 36, 'checklist' => 'Takes turns in games'],
           ['category_id' => 36, 'checklist' => 'Shows concern for a crying friend'],
           ['category_id' => 36, 'checklist' => 'Understands the idea of “mine” and “his” or “hers”'],
           ['category_id' => 36, 'checklist' => 'Shows a wide range of emotions'],
           ['category_id' => 36, 'checklist' => 'Separates easily from mom and dad'],
           ['category_id' => 36, 'checklist' => 'May get upset with major changes in routine'],
           ['category_id' => 36, 'checklist' => 'Dresses and undresses self'],
           ['category_id' => 37, 'checklist' => 'Follows instructions with 2 or 3 steps'],
           ['category_id' => 37, 'checklist' => 'Can name most familiar things'],
           ['category_id' => 37, 'checklist' => 'Understands words like “in,” “on,” and “under”'],
           ['category_id' => 37, 'checklist' => 'Says first name, age, and sex'],
           ['category_id' => 37, 'checklist' => 'Says first name, age, and sex'],
           ['category_id' => 37, 'checklist' => 'Says words like “I,” “me,” “we,” and “you” and some plurals
(cars, dogs, cats)'],
           ['category_id' => 37, 'checklist' => 'Talks well enough for strangers to understand most of the time'],
           ['category_id' => 37, 'checklist' => 'Carries on a conversation using 2 to 3 sentences'],
           ['category_id' => 38, 'checklist' => 'Can work toys with buttons, levers, and moving parts'],
           ['category_id' => 38, 'checklist' => 'Plays make-believe with dolls, animals, and people'],
           ['category_id' => 38, 'checklist' => 'Does puzzles with 3 or 4 pieces'],
           ['category_id' => 38, 'checklist' => 'Understands what “two” means'],
           ['category_id' => 38, 'checklist' => 'Copies a circle with pencil or crayon'],
           ['category_id' => 38, 'checklist' => 'Turns book pages one at a time'],
           ['category_id' => 38, 'checklist' => 'Builds towers of more than 6 blocks'],
           ['category_id' => 38, 'checklist' => 'Screws and unscrews jar lids or turns door handle'],
           ['category_id' => 39, 'checklist' => 'Climbs well'],
           ['category_id' => 39, 'checklist' => 'Runs easily'],
           ['category_id' => 39, 'checklist' => 'Pedals a tricycle (3-wheel bike)'],
           ['category_id' => 39, 'checklist' => ' Walks up and down stairs, one foot on each step'],
           ['category_id' => 40, 'checklist' => 'Go to play groups with your child or other places
where there are other children, to encourage getting
along with others'],
           ['category_id' => 40, 'checklist' => 'Work with your child to solve the problem when he
is upset'],
           ['category_id' => 40, 'checklist' => 'Talk about your child’s emotions. For example, say,
“I can tell you feel mad because you threw the
puzzle piece.” Encourage your child to identify
feelings in books'],
           ['category_id' => 40, 'checklist' => 'Set rules and limits for your child, and stick to them.
If your child breaks a rule, give him a time out for 30
seconds to 1 minute in a chair or in his room. Praise
your child for following the rules.'],
           ['category_id' => 40, 'checklist' => 'Give your child instructions with 2 or 3 steps.
For example, “Go to your room and get your shoes
and coat.”'],
           ['category_id' => 40, 'checklist' => 'Read to your child every day. Ask your child to point
to things in the pictures and repeat words after you.'],
           ['category_id' => 40, 'checklist' => 'Give your child an “activity box” with paper, crayons,
and coloring books. Color and draw lines and shapes
with your child.'],
           ['category_id' => 40, 'checklist' => 'Play matching games. Ask your child to find objects
in books or around the house that are the same'],
           ['category_id' => 40, 'checklist' => 'Play counting games. Count body parts, stairs, and
other things you use or see every day'],
           ['category_id' => 40, 'checklist' => 'Hold your child’s hand going up and down stairs.
When she can go up and down easily, encourage her
to use the railing'],
           ['category_id' => 40, 'checklist' => 'Play outside with your child. Go to the park or hiking
trail. Allow your child to play freely and without
structured activities.'],
           ['category_id' => 41, 'checklist' => 'Enjoys doing new things'],
           ['category_id' => 41, 'checklist' => 'Plays “Mom” and “Dad”'],
           ['category_id' => 41, 'checklist' => 's more and more creative with make-believe play'],
           ['category_id' => 41, 'checklist' => 'Would rather play with other children than by himself'],
           ['category_id' => 41, 'checklist' => 'Cooperates with other children'],
           ['category_id' => 41, 'checklist' => 'Often can’t tell what’s real and what’s make-believe'],
           ['category_id' => 41, 'checklist' => 'Talks about what she likes and what she is interested in'],
           ['category_id' => 42, 'checklist' => 'Knows some basic rules of grammar, such as correctly using
“he” and “she”'],
           ['category_id' => 42, 'checklist' => 'Sings a song or says a poem from memory such as the
“Itsy Bitsy Spider” or the “Wheels on the Bus”'],
           ['category_id' => 42, 'checklist' => 'Tells stories'],
           ['category_id' => 42, 'checklist' => 'Can say first and last name'],
           ['category_id' => 43, 'checklist' => 'Names some colors and some numbers'],
           ['category_id' => 43, 'checklist' => 'Understands the idea of counting'],
           ['category_id' => 43, 'checklist' => 'Starts to understand time'],
           ['category_id' => 43, 'checklist' => 'Remembers parts of a story'],
           ['category_id' => 43, 'checklist' => 'Understands the idea of “same” and “different”'],
           ['category_id' => 43, 'checklist' => 'Draws a person with 2 to 4 body parts'],
           ['category_id' => 43, 'checklist' => 'Uses scissors'],
           ['category_id' => 43, 'checklist' => 'Starts to copy some capital letters'],
           ['category_id' => 43, 'checklist' => 'Plays board or card games'],
           ['category_id' => 43, 'checklist' => 'Tells you what he thinks is going to happen next in a book'],
           ['category_id' => 44, 'checklist' => 'Hops and stands on one foot up to 2 seconds'],
           ['category_id' => 44, 'checklist' => 'Catches a bounced ball most of the time'],
           ['category_id' => 44, 'checklist' => 'Pours, cuts with supervision, and mashes own food'],
           ['category_id' => 45, 'checklist' => 'Play make-believe with your child. Let her be the
leader and copy what she is doing'],
           ['category_id' => 45, 'checklist' => 'Suggest your child pretend play an upcoming event
that might make him nervous, like going to preschool
or staying overnight at a grandparent’s house.'],
           ['category_id' => 45, 'checklist' => 'Give your child simple choices whenever you can.
Let your child choose what to wear, play, or eat for a
snack. Limit choices to 2 or 3'],
           ['category_id' => 45, 'checklist' => 'During play dates, let your child solve her own
problems with friends, but be nearby to help out
if needed.'],
           ['category_id' => 45, 'checklist' => 'Encourage your child to use words, share toys, and
take turns playing games of one another’s choice.'],
           ['category_id' => 45, 'checklist' => 'Give your child toys to build imagination, like
dress-up clothes, kitchen sets, and blocks.'],
           ['category_id' => 45, 'checklist' => 'Use good grammar when speaking to your child.
Instead of “Mommy wants you to come here,” say,
“I want you to come here.”'],
           ['category_id' => 45, 'checklist' => 'Use words like “first,” “second,” and “finally” when
talking about everyday activities. This will help your
child learn about sequence of events.'],
           ['category_id' => 45, 'checklist' => 'Take time to answer your child’s “why” questions.
If you don’t know the answer, say “I don’t know,” or
help your child find the answer in a book, on the
Internet, or from another adult'],
           ['category_id' => 45, 'checklist' => 'When you read with your child, ask him to tell you
what happened in the story as you go.'],
           ['category_id' => 45, 'checklist' => 'Say colors in books, pictures, and things at home.
Count common items, like the number of snack
crackers, stairs, or toy trains.'],
           ['category_id' => 45, 'checklist' => 'Teach your child to play outdoor games like tag,
follow the leader, and duck, duck, goose'],
           ['category_id' => 45, 'checklist' => 'Play your child’s favorite music and dance with your
child. Take turns copying each other’s moves.'],
           ['category_id' => 46, 'checklist' => 'Wants to please friends'],
           ['category_id' => 46, 'checklist' => 'Wants to be like friends'],
           ['category_id' => 46, 'checklist' => 'More likely to agree with rules'],
           ['category_id' => 46, 'checklist' => 'Likes to sing, dance, and act'],
           ['category_id' => 46, 'checklist' => 'Is aware of gender'],
           ['category_id' => 46, 'checklist' => ' Can tell what’s real and what’s make-believe'],
           ['category_id' => 46, 'checklist' => 'Shows more independence (for example, may visit a next-door
neighbor by himself [adult supervision is still needed])'],
           ['category_id' => 46, 'checklist' => 'Is sometimes demanding and sometimes very cooperative'],
           ['category_id' => 47, 'checklist' => 'Speaks very clearly'],
           ['category_id' => 47, 'checklist' => 'Tells a simple story using full sentences'],
           ['category_id' => 47, 'checklist' => 'Uses future tense; for example, “Grandma will be here.”'],
           ['category_id' => 47, 'checklist' => 'Says name and address'],
           ['category_id' => 48, 'checklist' => 'Counts 10 or more things'],
           ['category_id' => 48, 'checklist' => 'Can draw a person with at least 6 body parts'],
           ['category_id' => 48, 'checklist' => 'Can print some letters or numbers'],
           ['category_id' => 48, 'checklist' => 'Copies a triangle and other geometric shapes'],
           ['category_id' => 48, 'checklist' => 'Knows about things used every day, like money and food'],
           ['category_id' => 49, 'checklist' => 'Stands on one foot for 10 seconds or longer'],
           ['category_id' => 49, 'checklist' => 'Hops; may be able to skip'],
           ['category_id' => 49, 'checklist' => 'Can do a somersault'],
           ['category_id' => 49, 'checklist' => 'Uses a fork and spoon and sometimes a table knife'],
           ['category_id' => 49, 'checklist' => 'Can use the toilet on her own'],
           ['category_id' => 49, 'checklist' => 'Swings and climbs'],
           ['category_id' => 50, 'checklist' => 'Continue to arrange play dates, trips to the park,
or play groups. Give your child more freedom to
choose activities to play with friends, and let your
child work out problems on her own.'],
           ['category_id' => 50, 'checklist' => 'Your child might start to talk back or use profanity
(swear words) as a way to feel independent.
Do not give a lot of attention to this talk, other than
a brief time out. Instead, praise your child when
he asks for things nicely and calmly takes “no” for
an answer.'],
           ['category_id' => 50, 'checklist' => 'This is a good time to talk to your child about safe
touch. No one should touch “private parts” except
doctors or nurses during an exam or parents when
they are trying to keep the child clean.'],
           ['category_id' => 50, 'checklist' => 'Teach your child her address and phone number.'],
           ['category_id' => 50, 'checklist' => 'When reading to your child, ask him to predict
what will happen next in the story.'],
           ['category_id' => 50, 'checklist' => 'Encourage your child to “read” by looking at the
pictures and telling the story'],
           ['category_id' => 50, 'checklist' => 'Teach your child time concepts like morning,
afternoon, evening, today, tomorrow, and yesterday.
Start teaching the days of the week.'],
           ['category_id' => 50, 'checklist' => 'Explore your child’s interests in your community.
For example, if your child loves animals, visit the
zoo or petting farm. Go to the library or look on the
Internet to learn about these topics.'],
           ['category_id' => 50, 'checklist' => 'Keep a handy box of crayons, paper, paint, child
scissors, and paste. Encourage your child to draw
and make art projects with different supplies'],
           ['category_id' => 50, 'checklist' => 'Play with toys that encourage your child to put
things together'],
           ['category_id' => 50, 'checklist' => 'Teach your child how to pump her legs back and
forth on a swing.'],
           ['category_id' => 50, 'checklist' => 'Help your child climb on the monkey bars'],
           ['category_id' => 50, 'checklist' => 'Go on walks with your child, do a scavenger hunt
in your neighborhood or park, help him ride a bike
with training wheels (wearing a helmet).'],




       ];

        DB::table('checklists')->insert($values);
    }
}
